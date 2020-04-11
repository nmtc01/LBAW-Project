-----------------------------------------
-- TRANSACTIONS
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

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	SELECT add_user_management($first_name, $last_name, $email, $bio, $username, $password);
COMMIT;

--Transaction 2
CREATE OR REPLACE FUNCTION add_report_status(reporter_id INT, user_id INT, description TEXT, responsible_user INT) RETURNS void AS $$
BEGIN
	INSERT INTO report (reporter_id, user_id, description)
		VALUES (reporter_id, user_id, description);

	INSERT INTO report_status (report_id, responsible_user)
		VALUES (currval('report_id_seq'), responsible_user);
END;
$$ LANGUAGE plpgsql;

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
    SELECT  add_report_status($reporter_id, $user_id, $description, $responsible_user);
COMMIT;

--Transaction 3
CREATE OR REPLACE FUNCTION answered_question_notif(answer_user_id INT, question_user_id INT, question_id INT, answer_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO answer (user_id, question_id, content)
		VALUES (answer_user_id, question_id, answer_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id = answer_user_id), ' answered your question!'), question_user_id);
END;
$$ LANGUAGE plpgsql;

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	SELECT answered_question_notif($answer_user_id, $question_user_id, $question_id, $answer_content);
COMMIT;

--Transaction 4
CREATE OR REPLACE FUNCTION commented_question_notif(comment_user_id INT, question_user_id INT, question_id INT, comment_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO comment (user_id, question_id, content)
		VALUES (comment_user_id, question_user_id, comment_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id=comment_user_id), ' commented your question!'), question_user_id);
END;
$$ LANGUAGE plpgsql;

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	SELECT commented_question_notif($comment_user_id, $question_user_id, $question_id, $comment_content);
COMMIT;

--Transaction 5
CREATE OR REPLACE FUNCTION commented_answer_notif(comment_user_id INT, answer_user_id INT, answer_id INT, comment_content TEXT) RETURNS void AS $$
BEGIN
	INSERT INTO comment (user_id, answer_id, content)
		VALUES (comment_user_id, answer_user_id, comment_content);

	INSERT INTO notification (content, user_id)
		VALUES (CONCAT((SELECT username AS responsible FROM "user" WHERE id=comment_user_id), ' commented your answer!'), answer_user_id);
END;
$$ LANGUAGE plpgsql;

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;
	SELECT commented_answer_notif($comment_user_id, $answer_user_id, $answer_id, $comment_content);
COMMIT;