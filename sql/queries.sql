--SELECT01 
SELECT * FROM question
ORDER BY question.nr_likes desc
LIMIT 30;

--SELECT02    
SELECT * FROM question
ORDER BY question.question_date desc
LIMIT 30;

--SELECT03
SELECT * FROM question
ORDER BY answer.nr_likes desc
LIMIT 30;

--SELECT04
SELECT * FROM question
ORDER BY answer.answer_date desc
LIMIT 30;

--SELECT05                                    |
SELECT * FROM question
ORDER BY comment.comment_date desc
LIMIT 30;


--SELECT06
SELECT *
FROM label join about ON label.id = about.label_id
JOIN question ON question.id = about.question_id
GROUP BY label.id
LIMIT 5;

--SELECT07                              |
SELECT label.name
FROM label join about ON label.id = about.label_id
JOIN question ON question.id = about.question_id
WHERE label.name = $label_name
ORDER BY question.nr_likes desc
LIMIT 20;

--SELECT08
SELECT label.name
FROM label join about ON label.id = about.label_id
JOIN question ON question.id = about.question_id
WHERE label.name = $label_name
ORDER BY question.question_date desc
LIMIT 20;

--SELECT09
SELECT * 
FROM "user" u join question ON u.id = question.user_id
JOIN answer ON u.id = answer.user_id
WHERE u.id = $id;


--SELECT10
SELECT * 
FROM "user" u join notification ON u.id = notification.user_id
WHERE u.id = $id
ORDER BY notification.date desc;


--SELECT11
SELECT name, bio, first_name, last_name, score
FROM "user" u 
WHERE u.id = $id

--SELECT12   
SELECT name
FROM label 
WHERE name LIKE '%$string%'
ORDER BY notification.date desc;

--SELECT13     
SELECT name
FROM question 
WHERE description LIKE '%$string%' --probablywrong
ORDER BY notification.date desc;

--SELECT14
SELECT state, comment, responsible_user
FROM report 
WHERE answer_id IS NULL
AND comment_id IS NULL;

--SELECT15  
SELECT state, comment, responsible_user
FROM report 
WHERE question_id IS NULL
AND comment_id IS NULL;

--SELECT16 
SELECT state, comment, responsible_user
FROM report 
WHERE question_id IS NULL
AND answer_id IS NULL;

--SELECT17  
SELECT *
FROM report 
WHERE user_id IS NOT NULL
GROUP BY user_id;  -- Ver ordem

--SELECT18
SELECT *
FROM "user" u join user_management on u.id = user_management.user_id
where user_management.status == '
normal'
ORDER BY score desc
LIMIT 30;

--SELECT19   
SELECT *
FROM "user" u join user_management on u.id = user_management.user_id
where user_management.status == 'moderator'
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
```