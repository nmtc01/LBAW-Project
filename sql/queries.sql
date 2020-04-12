
--SELECT01
SELECT question.title, question.description, "user".username, question.nr_likes, question.nr_dislikes, question.question_date
FROM question JOIN "user" ON question.user_id = "user".id
ORDER BY question.nr_likes desc
LIMIT 30
OFFSET $offset;

--SELECT02
SELECT * FROM question
ORDER BY question.question_date desc
LIMIT 30
OFFSET $offset;

--SELECT03
SELECT * FROM answer
ORDER BY nr_likes desc
LIMIT 30
OFFSET $offset;

--SELECT04
SELECT * FROM answer
ORDER BY answer_date desc
LIMIT 30
OFFSET $offset

--SELECT05
SELECT * FROM comment
ORDER BY comment.comment_date desc
LIMIT 30
OFFSET $offset

--SELECT06
SELECT "label".name, count(*) as nr
FROM "label" join question_label ON "label".id = question_label.label_id
JOIN question ON question.id = question_label.question_id
group by "label".id
order by nr desc
limit 5;

--SELECT07
SELECT question.* , label.name
FROM label join question_label ON label.id = question_label.label_id
JOIN question ON question.id = question_label.question_id
where label.name = $label
order by question.nr_likes desc
LIMIT 30
OFFSET = $offset; 

--SELECT08
SELECT question.*
FROM label join question_label ON label.id = question_label.label_id
JOIN question ON question.id = question_label.question_id
where label.name = $label
order by question.answer_date desc
LIMIT 20;  

--SELECT09
SELECT question.title, (question.nr_likes - question.nr_dislikes) as score
from question
where question.user_id = 2;

--SELECT10
SELECT notification.* 
FROM "user" u join notification ON u.id = notification.user_id
WHERE u.id = 4
ORDER BY notification.date desc
LIMIT 5
OFFSET $offset;


--SELECT11
SELECT first_name, last_name, bio, score
FROM "user" u 
WHERE u.id = 4

--SELECT12
SELECT id, title
FROM label 
WHERE name LIKE '%$string%'
ORDER BY notification.date desc;

--SELECT13
SELECT id, title, 
FROM question 
WHERE description LIKE '%$string%' 
ORDER BY notification.date desc;

--SELECT14
SELECT report.*, u.username
FROM report join "user" u on u.id = report.reporter_id
WHERE answer_id IS NULL
AND comment_id IS NULL
and user_id is NULL;

--SELECT15
SELECT report.*, u.username
FROM report join "user" u on u.id = report.reporter_id
WHERE question_id IS NULL
AND comment_id IS NULL
and user_id is NULL;

--SELECT16
SELECT report.*, u.username
FROM report join "user" u on u.id = report.reporter_id
WHERE answer_id IS NULL
AND question_id IS NULL
and user_id is NULL;

--SELECT17
SELECT report.*, u.username
FROM report join "user" u on u.id = report.reporter_id
WHERE user_id is NOT NULL;

--SELECT18
SELECT *
FROM "user" u join user_management on u.id = user_management.user_id
where user_management.status = 'user'
ORDER BY score desc
LIMIT 30;

--SELECT19
SELECT *
FROM "user" u join user_management on u.id = user_management.user_id
where user_management.status = 'moderator'
ORDER BY score desc
LIMIT 30;

--SELECT20
SELECT *
FROM question WHERE id = $id;

--SELECT21
SELECT *
FROM comment WHERE id = $id;


--SELECT22
SELECT score
FROM "user" u WHERE u.id = $id;


--SELECT23
SELECT count(*) as nº
FROM answer
WHERE question_id = $id;

--SELECT24
select question.*
from question join question_following 
on question.id = question_following.question_id
where question_following.user_id = $id
limit 5;

--SELECT25
SELECT u.username, count(*) as reports 
FROM report 
JOIN "user" u ON u.id = report.user_id
GROUP BY u.id
ORDER BY reports desc;


--INSERT01
INSERT INTO questions (user_id, title, description)
 VALUES ($user_id, $title, $description);

--INSERT02
INSERT INTO answer (user_id, question_id, content)
 VALUES ($user_id, $question_id, $content);

--INSERT03
INSERT INTO comment (user_id, question_id, answer_id, content)
 VALUES ($user_id, $question_id, $answer_id $content);

--INSERT04
INSERT INTO "user" (first_name, last_name, email, bio, username, password, bio)
 VALUES ($first_name, $last_name, $email, $bio, $username, $password, $bio);

--UPDATE01
UPDATE "user"
 SET username = $username, bio = $bio, first_name = $first_name, last_name = $last_name
 VALUES id = $id;

--UPDATE02
UPDATE user_management
 SET status = $status
 VALUES user_id = $user_idid;

--UPDATE03
UPDATE question
 SET title = $title, description = $description
 VALUES id = $id;

--UPDATE04
UPDATE answer
 SET content = $content
 VALUES id = $id;

--UPDATE05
UPDATE comment
 SET content = $content
 VALUES id = $id;