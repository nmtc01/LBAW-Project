-----------------------------------------
-- Drop old schmema
-----------------------------------------

DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS label CASCADE;
DROP TABLE IF EXISTS notification CASCADE;
DROP TABLE IF EXISTS user_management CASCADE;
DROP TABLE IF EXISTS question CASCADE;
DROP TABLE IF EXISTS answer CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS vote CASCADE;
DROP TABLE IF EXISTS report CASCADE;
DROP TABLE IF EXISTS report_status CASCADE;
DROP TABLE IF EXISTS question_following CASCADE;
DROP TABLE IF EXISTS label_following CASCADE;
DROP TABLE IF EXISTS question_label CASCADE;

-----------------------------------------
-- Tables
-----------------------------------------


-- Table: user
CREATE TABLE "user" (
    id              SERIAL          PRIMARY KEY,
    first_name      TEXT            NOT NULL,
    last_name       TEXT            NOT NULL,
    email           TEXT            NOT NULL UNIQUE,
    bio             TEXT,
    username        TEXT            NOT NULL UNIQUE,
    password        TEXT            NOT NULL,
    score           INTEGER         NOT NULL DEFAULT 0,
	photo_path      TEXT      		DEFAULT 'unknown.png'
);

-- Table: label
CREATE TABLE label (
    id              SERIAL          PRIMARY KEY,
    name            TEXT            NOT NULL          
);

-- Table: user_management
CREATE TABLE user_management (
    id                  SERIAL          PRIMARY KEY,
    status              TEXT            DEFAULT 'user' NOT NULL,
    date_last_changed   DATE            DEFAULT 'Now' NOT NULL,
    user_id             INTEGER         REFERENCES "user" (id) NOT NULL UNIQUE,
    CHECK (
        status = 'user' OR status = 'moderator' OR status = 'administrator' OR status = 'banned' OR status = 'deleted'
    )
);

-- Table: question
CREATE TABLE question (
    id              SERIAL          PRIMARY KEY,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL,
    title           TEXT            NOT NULL,
    description     TEXT            NOT NULL,
    nr_likes        INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes     INTEGER         DEFAULT 0 NOT NULL,
    question_date   DATE            DEFAULT 'Now' NOT NULL,
    CHECK (
        nr_likes >= 0 AND nr_dislikes >= 0
    )         
);

-- Table: notification
CREATE TABLE notification (
    id              SERIAL          PRIMARY KEY,
    content         TEXT            NOT NULL,
    date            DATE            DEFAULT 'Now' NOT NULL,
    viewed          BOOLEAN         DEFAULT FALSE NOT NULL,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL,
	question_id		INTEGER			DEFAULT NULL REFERENCES "question" (id) ON DELETE CASCADE
);

-- Table: answer
CREATE TABLE answer (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE NOT NULL,
    answer_date      DATE            DEFAULT 'Now' NOT NULL,
    content          TEXT            NOT NULL,
    nr_likes         INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes      INTEGER         DEFAULT 0 NOT NULL,
    marked_answer    BOOLEAN         DEFAULT FALSE NOT NULL,
    CHECK (
        nr_likes >= 0 AND nr_dislikes >= 0
    )    
);

-- Table: comment
CREATE TABLE comment (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE,
    answer_id        INTEGER         REFERENCES "answer" (id) ON DELETE CASCADE,
    content          TEXT            NOT NULL,
    comment_date     DATE            DEFAULT 'Now' NOT NULL,
    CHECK (
        (question_id IS NOT NULL AND answer_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL)
    )
);

-- Table: vote
CREATE TABLE vote (
    id               SERIAL          PRIMARY KEY,
    "vote"           BOOLEAN         NOT NULL,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE,
    answer_id        INTEGER         REFERENCES "answer" (id) ON DELETE CASCADE,
    CHECK (
        (question_id IS NOT NULL AND answer_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL)
    )
);

-- Table: report
CREATE TABLE report (
    id               SERIAL          PRIMARY KEY,
    reporter_id      INTEGER         REFERENCES "user" (id) NOT NULL,
    user_id          INTEGER         REFERENCES "user" (id),
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE,
    answer_id        INTEGER         REFERENCES "answer" (id) ON DELETE CASCADE,   
    comment_id       INTEGER         REFERENCES "comment" (id) ON DELETE CASCADE,
    report_date      DATE            DEFAULT 'Now' NOT NULL,
    description      TEXT            NOT NULL,
    CHECK(
        (user_id IS NOT NULL AND question_id IS NULL AND answer_id IS NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NOT NULL AND answer_id IS NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NULL AND answer_id IS NOT NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NULL AND answer_id IS NULL AND comment_id IS NOT NULL)
    )
);

-- Table: report_status
CREATE TABLE report_status (
    id               SERIAL          PRIMARY KEY,
    report_id        INTEGER         REFERENCES "report" (id) ON DELETE CASCADE NOT NULL,
    state            TEXT            DEFAULT 'unresolved' NOT NULL,
    comment          TEXT,
    responsible_user INTEGER         REFERENCES "user" (id) ON DELETE CASCADE NOT NULL,
    CHECK (
        state = 'unresolved' OR state = 'reviewing' OR state = 'resolved'
    )
);

-- Table: question_following
CREATE TABLE question_following (
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE NOT NULL,
    PRIMARY KEY (user_id, question_id)
);

-- Table: label_following
CREATE TABLE label_following (
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) ON DELETE CASCADE NOT NULL,
    PRIMARY KEY (user_id, label_id)
);

-- Table: question_label
CREATE TABLE question_label (
    question_id      INTEGER         REFERENCES "question" (id) ON DELETE CASCADE NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) ON DELETE CASCADE NOT NULL,
    PRIMARY KEY (question_id, label_id)
);

-----------------------------------------
-- INDEXES
-----------------------------------------

CREATE INDEX question_score ON question USING btree(nr_likes);
CREATE INDEX question_date ON question USING btree(question_date);
CREATE INDEX answer_score ON answer USING btree(question_id, nr_likes);
CREATE INDEX answer_date ON answer USING btree(question_id, answer_date);
CREATE INDEX comment_date ON comment USING btree(question_id, comment_date);
CREATE INDEX label_popularity ON label_following USING btree(label_id);
CREATE INDEX question_user ON question USING btree(user_id);
CREATE INDEX answer_user ON answer USING btree(user_id);
CREATE INDEX notification_user_date ON notification USING btree(user_id, date);
CREATE INDEX user_username ON "user" USING hash(username);
CREATE INDEX report_user ON report USING btree(user_id);
CREATE INDEX user_score ON "user" USING btree(score);

CREATE INDEX label_name ON label USING gin(to_tsvector('english', name));
CREATE INDEX question_title ON question USING gist(to_tsvector('english', title));

-----------------------------------------
-- TRIGGERS and UDFs
-----------------------------------------
--Trigger 1
CREATE OR REPLACE FUNCTION update_score_question() RETURNS TRIGGER AS
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

--extra trigger

CREATE OR REPLACE FUNCTION update_score_question_delete() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT vote.id FROM vote WHERE OLD."vote" = FALSE) THEN
		UPDATE question
		SET nr_dislikes = nr_dislikes-1
		WHERE OLD.question_id = id;
		UPDATE "user"
		SET score = score+1
		FROM question
		WHERE OLD.question_id = question.id AND question.user_id = "user".id;
    ELSE IF EXISTS (SELECT vote.id FROM vote WHERE OLD."vote" = TRUE) THEN
        UPDATE question
		SET nr_likes = nr_likes-1
		WHERE OLD.question_id = id;
		UPDATE "user"
		SET score = score-1
		FROM question
		WHERE OLD.question_id = question.id AND question.user_id = "user".id;
    END IF;
	END IF;
    RETURN OLD;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_score_question_delete
    AFTER DELETE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE update_score_question_delete();

	------


--Trigger 2
CREATE OR REPLACE FUNCTION update_score_answer() RETURNS TRIGGER AS
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

--extra trigger 2


CREATE OR REPLACE FUNCTION update_score_answer_delete() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT vote.id FROM vote WHERE OLD."vote" = FALSE) THEN
		UPDATE answer
		SET nr_dislikes = nr_dislikes-1
		WHERE OLD.answer_id = id;
		UPDATE "user"
		SET score = score+1
		FROM answer
		WHERE OLD.answer_id = answer.id AND answer.user_id = "user".id;
    ELSE IF EXISTS (SELECT vote.id FROM vote WHERE OLD."vote" = TRUE) THEN
        UPDATE answer
		SET nr_likes = nr_likes-1
		WHERE OLD.answer_id = id;
		UPDATE "user"
		SET score = score-1
		FROM answer
		WHERE OLD.answer_id = answer.id AND answer.user_id = "user".id;
    END IF;
	END IF;
    RETURN OLD;
END
$BODY$
LANGUAGE plpgsql;
 
CREATE TRIGGER update_score_answer_delete
    AFTER DELETE ON vote
    FOR EACH ROW
    EXECUTE PROCEDURE update_score_answer_delete();
--

--Trigger 3
CREATE OR REPLACE FUNCTION vote_own_question() RETURNS TRIGGER AS
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
CREATE OR REPLACE FUNCTION vote_own_answer() RETURNS TRIGGER AS
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
CREATE OR REPLACE FUNCTION answer_date() RETURNS TRIGGER AS
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
CREATE OR REPLACE FUNCTION comment_date_answer() RETURNS TRIGGER AS
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
CREATE OR REPLACE FUNCTION comment_date_question() RETURNS TRIGGER AS
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
CREATE OR REPLACE FUNCTION vote_once() RETURNS TRIGGER AS
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
/*CREATE OR REPLACE FUNCTION report_status_responsible() RETURNS TRIGGER AS
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
    EXECUTE PROCEDURE report_status_responsible();*/


--Trigger 10
CREATE OR REPLACE FUNCTION marked_answer() RETURNS TRIGGER AS
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

--Trigger 11
CREATE OR REPLACE FUNCTION add_new_management_to_user() RETURNS TRIGGER AS 
$BODY$
BEGIN
	IF EXISTS (SELECT * FROM user_management WHERE user_management.user_id = NEW.user_id) THEN
	DELETE FROM user_management WHERE user_management.user_id = NEW.user_id;
	END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_new_management_to_user
    BEFORE INSERT ON user_management
    FOR EACH ROW
    EXECUTE PROCEDURE add_new_management_to_user();


--Trigger 12
CREATE OR REPLACE FUNCTION add_management_to_user() RETURNS TRIGGER AS 
$BODY$
BEGIN
	IF NOT EXISTS (SELECT * FROM user_management WHERE user_management.user_id = NEW.id) THEN
	INSERT INTO user_management (id, user_id)
		VALUES (NEW.id, NEW.id);
	END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_management_to_user
    AFTER INSERT ON "user"
    FOR EACH ROW
    EXECUTE PROCEDURE add_management_to_user();

-----------------------------------------
-- TRANSACTIONS FUNCTIONS
-----------------------------------------
--Transaction 1
CREATE OR REPLACE FUNCTION add_user_management(first_name TEXT, last_name TEXT, email TEXT, bio TEXT, username TEXT, password TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO "user" (first_name, last_name, email, bio, username, password) 
		VALUES (first_name, last_name, email, bio, username, password);
	INSERT INTO user_management (user_id)
		VALUES (currval('user_id_seq'));
END;
$$ LANGUAGE plpgsql;

--Transaction 2
CREATE OR REPLACE FUNCTION add_report_status(reporter_id INT, user_id INT, description TEXT, responsible_user INT) RETURNS void AS $$
BEGIN
	INSERT INTO report (reporter_id, user_id, description)
		VALUES (reporter_id, user_id, description);

	INSERT INTO report_status (report_id, responsible_user)
		VALUES (currval('report_id_seq'), responsible_user);
END;
$$ LANGUAGE plpgsql;

--Transaction 3
CREATE OR REPLACE FUNCTION answered_question_notif(answer_user_id INT, question_user_id INT, question_id INT, answer_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO answer (user_id, question_id, content)
		VALUES (answer_user_id, question_id, answer_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id = answer_user_id), ' answered your question!'), question_user_id);
END;
$$ LANGUAGE plpgsql;

--Transaction 4
CREATE OR REPLACE FUNCTION commented_question_notif(comment_user_id INT, question_user_id INT, question_id INT, comment_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO comment (user_id, question_id, content)
		VALUES (comment_user_id, question_user_id, comment_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id=comment_user_id), ' commented your question!'), question_user_id);
END;
$$ LANGUAGE plpgsql;

--Transaction 5
CREATE OR REPLACE FUNCTION commented_answer_notif(comment_user_id INT, answer_user_id INT, answer_id INT, comment_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO comment (user_id, answer_id, content)
		VALUES (comment_user_id, answer_user_id, comment_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id=comment_user_id), ' commented your answer!'), answer_user_id);
END;
$$ LANGUAGE plpgsql;

-----------------------------------------
-- end
-----------------------------------------