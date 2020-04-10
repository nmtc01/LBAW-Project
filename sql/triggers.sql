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
CREATE FUNCTION report_status_responsible() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT user_management.user_id 
				   FROM user_management
				   WHERE ((user_management.status = 'moderator' OR user_management.status = 'administrator')
						  AND
						  (user_management.user_id = NEW.responsible_user))) THEN
			RAISE EXCEPTION 'A report can only be handled by an administrator or moderator';
	END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER report_status_responsible
    BEFORE INSERT OR UPDATE ON report_status
    FOR EACH ROW
    EXECUTE PROCEDURE report_status_responsible();


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