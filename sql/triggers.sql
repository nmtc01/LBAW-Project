--Trigger 1
CREATE FUNCTION update_score_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT vote.id FROM vote WHERE NEW."vote" = FALSE) THEN
		UPDATE question
		SET nr_dislikes = nr_dislikes+1
		WHERE NEW.question_id = id;
		UPDATE "user"
		SET score = score-1
		FROM question
		WHERE NEW.question_id = question.id AND question.user_id = "user".id;
    ELSE IF EXISTS (SELECT vote.id FROM vote WHERE NEW."vote" = TRUE) THEN
        UPDATE question
		SET nr_likes = nr_likes+1
		WHERE NEW.question_id = id;
		UPDATE "user"
		SET score = score+1
		FROM question
		WHERE NEW.question_id = question.id AND question.user_id = "user".id;
    END IF;
	END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_score_question
    AFTER INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE update_score_question();


--Trigger 2
CREATE FUNCTION update_score_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT vote.id FROM vote WHERE NEW."vote" = FALSE) THEN
		UPDATE answer
		SET nr_dislikes = nr_dislikes+1
		WHERE NEW.answer_id = id;
		UPDATE "user"
		SET score = score-1
		FROM answer
		WHERE NEW.answer_id = answer.id AND answer.user_id = "user".id;
    ELSE IF EXISTS (SELECT vote.id FROM vote WHERE NEW."vote" = TRUE) THEN
        UPDATE answer
		SET nr_likes = nr_likes+1
		WHERE NEW.answer_id = id;
		UPDATE "user"
		SET score = score+1
		FROM answer
		WHERE NEW.answer_id = answer.id AND answer.user_id = "user".id;
    END IF;
	END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_score_answer
    AFTER INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE update_score_answer();


--Trigger 3
CREATE FUNCTION vote_own_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT question.user_id
			   FROM question
               WHERE NEW.user_id = question.user_id AND NEW.question_id = question.id) THEN
        RAISE EXCEPTION 'A user cannot vote on his own question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER vote_own_question
    BEFORE INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_own_question();


--Trigger 4
CREATE FUNCTION vote_own_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT answer.user_id
			   FROM answer
               WHERE NEW.user_id = answer.user_id AND NEW.answer_id = answer.id) THEN
        RAISE EXCEPTION 'A user cannot vote on his own answer';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER vote_own_answer
    BEFORE INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_own_answer();


--Trigger 5
CREATE FUNCTION answer_date() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT question.question_date 
			   FROM question 
               WHERE NEW.question_id = question.id AND NEW.answer_date < question.question_date) THEN
        RAISE EXCEPTION 'The date of an answer cannot be earlier than the date of its question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER answer_date
    BEFORE INSERT OR UPDATE ON answer
    FOR EACH ROW
    EXECUTE PROCEDURE answer_date();


--Trigger 6
CREATE FUNCTION comment_date_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT answer.answer_date 
			   FROM answer 
               WHERE NEW.answer_id = answer.id AND NEW.comment_date < answer.answer_date) THEN
        RAISE EXCEPTION 'The date of a comment cannot be earlier than the date of its answer';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER comment_date_answer
    BEFORE INSERT OR UPDATE ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE comment_date_answer();


--Trigger 7
CREATE FUNCTION comment_date_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT question.question_date 
			   FROM question 
               WHERE NEW.question_id = question.id AND NEW.comment_date < question.question_date) THEN
        RAISE EXCEPTION 'The date of a comment cannot be earlier than the date of its question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER comment_date_question
    BEFORE INSERT OR UPDATE ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE comment_date_question();


--Trigger 8
CREATE FUNCTION vote_once() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM vote 
               WHERE ((NEW.user_id = vote.user_id AND NEW.question_id = vote.question_id) OR
                      (NEW.user_id = vote.user_id AND NEW.answer_id = vote.answer_id))) THEN
        RAISE EXCEPTION 'An element can only be voted once by the same user';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER vote_once
    BEFORE INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_once();


--Trigger 9
CREATE FUNCTION report_status() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT report_status.id, report.id 
                   FROM report_status, report 
                   WHERE report_status.id = report.id) THEN
    INSERT INTO report_status
        SELECT NEW.id, 'unresolved', comment, responsible_user
        FROM report_status, user_management
        WHERE (user_management.status = 'moderator' OR user_management.status = 'administrator'); 
    RETURN NEW;
	END IF;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER report_status
    AFTER INSERT ON report
    FOR EACH ROW
    EXECUTE PROCEDURE report_status();


--Trigger 10
CREATE FUNCTION marked_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
	IF EXISTS (SELECT marked_answer FROM answer WHERE answer.id = NEW.id AND NEW.marked_answer = TRUE) THEN
    UPDATE answer
    SET marked_answer = FALSE
    WHERE (answer.question_id = NEW.question_id AND answer.id != NEW.id);
	END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER marked_answer
    AFTER UPDATE OF marked_answer ON answer
    FOR EACH ROW
    EXECUTE PROCEDURE marked_answer();


--Verify triggers
--Trigger 1
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (2, 'Manel', 'Sousa', 'manel@gmail.com', 'Gosto de desporto', 'manel01', 'wtuietuytytydgfg', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (3, 'Nuno', 'Cardoso', 'nc@gmail.com', 'Gosto de futebol', 'nc01', 'wtudasgietuytyty', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (4, 'Pedro', 'Dantas', 'pdantas@gmail.com', 'Gosto de cantar', 'pdantas01', 'ehgdfhhgf', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO vote("vote", user_id, question_id)
    values (false, 2, 1);
INSERT INTO vote("vote", user_id, question_id)
    values (false, 3, 1);
INSERT INTO vote("vote", user_id, question_id)
    values (false, 4, 1);

--Trigger 2
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (2, 'Manel', 'Sousa', 'manel@gmail.com', 'Gosto de desporto', 'manel01', 'wtuietuytytydgfg', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (3, 'Nuno', 'Cardoso', 'nc@gmail.com', 'Gosto de futebol', 'nc01', 'wtudasgietuytyty', 0);
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (4, 'Pedro', 'Dantas', 'pdantas@gmail.com', 'Gosto de cantar', 'pdantas01', 'ehgdfhhgf', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-30', 'Start watching videos', 0, 0, false);
INSERT INTO vote("vote", user_id, answer_id)
    values (true, 2, 1);
INSERT INTO vote("vote", user_id, answer_id)
    values (false, 3, 1);
INSERT INTO vote("vote", user_id, answer_id)
    values (true, 4, 1);

--Trigger 3
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO vote("vote", user_id, question_id)
    values (true, 1, 1);

--Trigger 4
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-29', 'Start watching videos', 0, 0, false);
INSERT INTO vote("vote", user_id, answer_id)
    values (true, 1, 1);

--Trigger 5
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-29', 'Start watching videos', 0, 0, false);

--Trigger 6
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-30', 'Start watching videos', 0, 0, false);
INSERT INTO comment(user_id, answer_id, comment_date, content)
    values (1, 1, '2020-03-29', 'cenas e tal');

--Trigger 7
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO comment(user_id, question_id, comment_date, content)
    values (1, 1, '2020-03-29', 'cenas e tal');

--Trigger 8
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-30', 'Start watching videos', 0, 0, false);
INSERT INTO vote("vote", user_id, answer_id)
    values (true, 1, 1);
INSERT INTO vote("vote", user_id, answer_id)
    values (true, 1, 1);

--Trigger 9
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO report(id, user_id, question_id)
    values (1, 1, 1);

--Trigger 10
INSERT INTO "user"(id, first_name, last_name, email, bio, username, password, score) 
	values (1, 'Maria', 'Silva', 'msilva@gmail.com', 'Gosto de ciência', 'msilva01', 'etrfetfdregretdrd', 0);
INSERT INTO question(id, user_id, title, description, nr_likes, nr_dislikes, question_date)
	values (1, 1, 'How can I learn C++?', 'I really want to learn C++.', 0, 0, '2020-03-30');
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (1, 1, 1, '2020-03-30', 'Start watching videos', 0, 0, false);
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (2, 1, 1, '2020-03-30', 'Go to the school.', 0, 0, true);
INSERT INTO answer(id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer)
	values (3, 1, 1, '2020-03-30', 'Bah.', 0, 0, true);

UPDATE answer 
SET marked_answer = true
WHERE id = 3;
	