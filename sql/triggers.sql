--Trigger 1
CREATE FUNCTION update_score_question() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT "vote",question_id FROM vote WHERE "vote" = FALSE AND question_id = question.id) THEN
        INSERT INTO question
            SELECT id, user_id, title, description, nr_likes, nr_dislikes+1, question_date 
            FROM question JOIN vote
            WHERE vote.question_id = question.id 
        INSERT INTO "user"
            SELECT id, first_name, last_name, email, bio, username, password, score-1 
            FROM "user" JOIN vote
            WHERE vote.user_id = "user".id
    ELSE IF EXISTS (SELECT "vote",question_id FROM vote WHERE "vote" = TRUE AND question_id = question.id) THEN
        INSERT INTO question
            SELECT id, user_id, title, description, nr_likes+1, nr_dislikes, question_date 
            FROM question JOIN vote
            WHERE vote.question_id = question.id
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
            WHERE vote.answer_id = answer.id 
    ELSE IF EXISTS (SELECT "vote",answer_id FROM vote WHERE "vote" = TRUE AND answer_id = answer.id) THEN
        INSERT INTO answer
            SELECT id, user_id, question_id, answer_date, content, nr_likes+1, nr_dislikes, marked_answer
            FROM answer JOIN vote
            WHERE vote.answer_id = answer.id
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_scores
    AFTER INSERT ON vote
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
    BEFORE INSERT ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE vote_own_answer()
    EXECUTE PROCEDURE vote_own_question();