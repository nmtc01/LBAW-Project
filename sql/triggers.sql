--Trigger 1
CREATE FUNCTION update_score_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT "vote",question_id FROM vote WHERE "vote" = FALSE AND question_id = question.id) THEN
        INSERT INTO question
            SELECT id, user_id, title, description, nr_likes, nr_dislikes+1, question_date 
            FROM question JOIN vote
            WHERE vote.question_id = question.id; 
        INSERT INTO "user"
            SELECT id, first_name, last_name, email, bio, username, password, score-1 
            FROM "user" JOIN vote
            WHERE vote.user_id = "user".id;
    ELSE IF EXISTS (SELECT "vote",question_id FROM vote WHERE "vote" = TRUE AND question_id = question.id) THEN
        INSERT INTO question
            SELECT id, user_id, title, description, nr_likes+1, nr_dislikes, question_date 
            FROM question JOIN vote
            WHERE vote.question_id = question.id;
        INSERT INTO "user"
            SELECT id, first_name, last_name, email, bio, username, password, score+1 
            FROM "user" JOIN vote
            WHERE vote.user_id = "user".id;
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE FUNCTION update_score_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT "vote",answer_id FROM vote WHERE "vote" = FALSE AND answer_id = answer.id) THEN
        INSERT INTO answer
            SELECT id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes+1, marked_answer
            FROM answer JOIN vote
            WHERE vote.answer_id = answer.id; 
        INSERT INTO "user"
            SELECT id, first_name, last_name, email, bio, username, password, score-1 
            FROM "user" JOIN vote
            WHERE vote.user_id = "user".id;
    ELSE IF EXISTS (SELECT "vote",answer_id FROM vote WHERE "vote" = TRUE AND answer_id = answer.id) THEN
        INSERT INTO answer
            SELECT id, user_id, question_id, answer_date, content, nr_likes+1, nr_dislikes, marked_answer
            FROM answer JOIN vote
            WHERE vote.answer_id = answer.id;
        INSERT INTO "user"
            SELECT id, first_name, last_name, email, bio, username, password, score+1 
            FROM "user" JOIN vote
            WHERE vote.user_id = "user".id;
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_scores
    AFTER INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE update_score_question()
    EXECUTE PROCEDURE update_score_answer();


--Trigger 2
CREATE FUNCTION vote_own_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM vote JOIN question 
               WHERE NEW.user_id = question.user_id) THEN
        RAISE EXCEPTION 'A user cannot vote on his own question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE FUNCTION vote_own_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM vote JOIN answer 
               WHERE NEW.user_id = answer.user_id) THEN
        RAISE EXCEPTION 'A user cannot vote on his own question';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER vote_own
    BEFORE INSERT OR UPDATE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_own_answer()
    EXECUTE PROCEDURE vote_own_question();


--Trigger 3
CREATE FUNCTION answer_date() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT answer_date, question_date FROM answer JOIN question 
               WHERE NEW.question_id = question.id AND answer_date < question_date) THEN
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


--Trigger 4
CREATE FUNCTION comment_date_answer() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT answer_date, comment_date FROM answer JOIN comment 
               WHERE NEW.answer_id = answer.id AND comment_date < answer_date) THEN
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


--Trigger 5
CREATE FUNCTION comment_date_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT question_date, comment_date FROM question JOIN comment 
               WHERE NEW.question_id = question.id AND comment_date < question_date) THEN
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


--Trigger 6
CREATE FUNCTION vote_once() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM vote 
               WHERE ((NEW.user_id = OLD.user_id AND NEW.question_id = OLD.question_id) OR
                      (NEW.user_id = OLD.user_id AND NEW.answer_id = OLD.answer_id)) THEN
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


--Trigger 7
/*CREATE FUNCTION report_status() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT report_status.id, report.id 
                   FROM report_status, report 
                   WHERE report_status.id = report.id)
    INSERT INTO report_status (report_id, )
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER report_status
    AFTER INSERT ON report
    FOR EACH ROW
    EXECUTE PROCEDURE report_status();*/