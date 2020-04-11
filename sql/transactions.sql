-----------------------------------------
-- TRANSACTIONS
-----------------------------------------
--Transaction 1
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	do $$
		DECLARE
			NEXT_USER_ID integer := nextval('user_id_seq');
	begin
		INSERT INTO "user" (id, first_name, last_name, email, bio, username, password)
			VALUES (NEXT_USER_ID, 'joao', 'albino', 'moreira@gmail.com', 'UP student', 'jalbino', '261345b0529b50d25f9d3b0a3276c09380ef5c5824548d04a240413cd32f02e8');

		INSERT INTO user_management (user_id)
			VALUES (NEXT_USER_ID);
	end $$;
COMMIT;

--Transaction 2
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
    	do $$
		DECLARE
			NEXT_REPORT_ID integer := nextval('report_id_seq');
	begin
		INSERT INTO report (id, reporter_id, user_id, description)
			VALUES (NEXT_REPORT_ID, 1, 27, 'Offensive behaviour');

		INSERT INTO report_status (report_id, responsible_user)
			VALUES (NEXT_REPORT_ID, 1);
	end $$;
COMMIT;

--Transaction 3
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	do $$
		DECLARE
			USER_RECIEVED_NOTIFICATION_ID integer := (select user_id from question where question.id=1);
			USER_SEND_NOTIFICATION_USERNAME text := (select username from "user" where id=1);
			ANSWER_CONTENT text := CONCAT(USER_SEND_NOTIFICATION_USERNAME, ' answered your question!');
	begin
		INSERT INTO answer (user_id, question_id, content)
			VALUES (1, 1,'That is a detail of divine creation!');

		INSERT INTO notification (content, user_id)
			VALUES (ANSWER_CONTENT, USER_RECIEVED_NOTIFICATION_ID);
	end $$;
COMMIT;

--Transaction 4
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	do $$
		DECLARE
			USER_RECIEVED_NOTIFICATION_ID integer := (select user_id from question where question.id=1);
			USER_SEND_NOTIFICATION_USERNAME text := (select username from "user" where id=1);
			COMMENT_CONTENT text := CONCAT(USER_SEND_NOTIFICATION_USERNAME, ' commented your question!');
	begin
		INSERT INTO comment (user_id, question_id, content)
			VALUES (1, 1,'Irrelevant question!');

		INSERT INTO notification (content, user_id)
			VALUES (COMMENT_CONTENT, USER_RECIEVED_NOTIFICATION_ID);
	end $$;
COMMIT;

--Transaction 5
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	do $$
		DECLARE
			USER_RECIEVED_NOTIFICATION_ID integer := (select user_id from answer where answer.id=1);
			USER_SEND_NOTIFICATION_USERNAME text := (select username from "user" where id=1);
			COMMENT_CONTENT text := CONCAT(USER_SEND_NOTIFICATION_USERNAME, ' commented your answer!');
	begin
		INSERT INTO comment (user_id, answer_id, content)
			VALUES (1, 1,'Irrelevant answer!');

		INSERT INTO notification (content, user_id)
			VALUES (COMMENT_CONTENT, USER_RECIEVED_NOTIFICATION_ID);
	end $$;
COMMIT;


CREATE OR REPLACE FUNCTION test(first_name TEXT, last_name TEXT, email TEXT, bio TEXT, username TEXT, password TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO "user" (first_name, last_name, email, bio, username, password) 
		VALUES (first_name, last_name, email, bio, username, password);
	INSERT INTO user_management (user_id)
		VALUES (currval('user_id_seq'));
END;
$$ LANGUAGE plpgsql;

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	SELECT test($first_name, $last_name, $email, $bio, $username, $password);
COMMIT;