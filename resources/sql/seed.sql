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
    score           INTEGER         NOT NULL DEFAULT 0              
);

-- Table: label
CREATE TABLE label (
    id              SERIAL          PRIMARY KEY,
    name            TEXT            NOT NULL          
);

-- Table: notification
CREATE TABLE notification (
    id              SERIAL          PRIMARY KEY,
    content         TEXT            NOT NULL,
    date            DATE            DEFAULT 'Now' NOT NULL,
    viewed          BOOLEAN         DEFAULT FALSE NOT NULL,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL
);

-- Table: user_management
CREATE TABLE user_management (
    id                  SERIAL          PRIMARY KEY,
    status              TEXT            DEFAULT 'user' NOT NULL,
    date_last_changed   DATE            DEFAULT 'Now' NOT NULL,
    user_id             INTEGER         REFERENCES "user" (id) NOT NULL UNIQUE,
    CHECK (
        status = 'user' OR status = 'moderator' OR status = 'administrator' OR status = 'banned'
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

-- Table: answer
CREATE TABLE answer (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) NOT NULL,
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
    question_id      INTEGER         REFERENCES "question" (id),
    answer_id        INTEGER         REFERENCES "answer" (id),
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
    question_id      INTEGER         REFERENCES "question" (id),
    answer_id        INTEGER         REFERENCES "answer" (id),
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
    question_id      INTEGER         REFERENCES "question" (id),
    answer_id        INTEGER         REFERENCES "answer" (id),   
    comment_id       INTEGER         REFERENCES "comment" (id),
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
    question_id      INTEGER         REFERENCES "question" (id) NOT NULL,
    PRIMARY KEY (user_id, question_id)
);

-- Table: label_following
CREATE TABLE label_following (
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) NOT NULL,
    PRIMARY KEY (user_id, label_id)
);

-- Table: question_label
CREATE TABLE question_label (
    question_id      INTEGER         REFERENCES "question" (id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) NOT NULL,
    PRIMARY KEY (question_id, label_id)
);



--user
-- password for user 2: mega_pass 
/*insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (1, 'Nuno', 'Cardoso', 'nmtc01@hotmail.com', 'UP student', 'nmtc01', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (2, 'Pedro', 'Dantas', 'pedrodantas@hotmail.com', 'UP student', 'pedrodantas', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (3, 'Eduardo', 'Macedo', 'edumacedo@gmail.com', 'UP student', 'edu1234', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (4, 'Roberto', 'Mourato', 'robmoura@hotmail.com', 'UP student', 'bob56moura', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (5, 'Lurdes', 'Cardoso', 'lurdes01@hotmail.com', 'babysitter', 'lurdes01', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (6, 'Paula', 'Tavares', 'paultavares@hotmail.com', 'hairdresser', 'paula64', '39427764c90328dc57389a2adb9202ae18cb3c38f27f5e7d3a19e5d23d7bbe4f');	
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (7, 'Paulo', 'Cardoso', 'pcardoso@gmail.com', 'caixa', 'pcardoso', '359b5c9cef644b8cf40dd4c4b046bb69602efe18f2ffb75350d3d15dcff275c0');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (8, 'Juliana', 'Pinto', 'jupinto@gmail.com', 'beautician', 'juju', 'b04a508509a4b3cd0aa7a5a5824c3bce43e8512572cbc35506a255f6a56da2c5');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (9, 'Carolina', 'Santos', 'carol@gmail.com', 'Up student', 'carolas', 'b04a508509a4b3cd0aa7a5a5824c3bce43e8512572cbc35506a255f6a56da2c5');	
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (10, 'Clarinda', 'Teixeira', 'cteixeira@gmail.com', 'secretary', 'lindas', 'f15c4ab57663235d2212e96c280feae3e73ece417252d82c8784b34bad60cac');	
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (11, 'Teresa', 'Teixeira', 'teresateixeira@gmail.com', 'seamstress', 'costureirinha', '327e51644afc5c688575ae43f30293513b6ed0dc6015ac12bf43f83628f739ea');


-- questions
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (1, 4, 'Name some great method actors', 'What are some fascinating examples of how an actor got into character for a movie role?', 7, 2, '2019-12-03');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (2, 2, 'Are intelligent and wise people the same?', 'What is the difference between an intelligent person and a wise person?', 10, 5, '2019-11-24');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (3, 1, 'Who are the biggest jerks in music?', 'Can you name some musicians that are particularly obnoxious? Who are the biggest douchebags in the music world?', 10, 5, '2020-01-2');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (4, 3, 'Is there a difference between every day and everyday?', 'This an english language question that has always tormented me. I never know which of the two should I use, or if there is any difference at all.', 10, 11, '2019-04-18');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (5, 6, 'Will science reconcile with religion in the future?', 'Just wondering if I could ever pair the certainty of science with my love for the lord.', 2, 3, '2020-02-02');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (6, 7, 'Can someone explain to me the AirPod hype?', 'Why are Apples AirPods so hyped up when fake Airpods work just the same?', 3, 2, '2019-09-30');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (7, 5, 'Running a program from within java code', 'What is the simplest way to call a program from with a piece of Java code? (The program I want to run is aiSee and it can be run from command line or from Windows GUI; and I am on Vista but the code will also be run on Linux systems).', 7, 5, '2020-11-04');
insert into question (id, user_id, title, description, nr_likes, nr_dislikes, question_date) 
	values (8, 8, 'What is the best TV series and why?', 'I would like to really get into a tv show, but I only want to watch the best of the best.', 10, 5, '2020-03-20');
insert into question (id, user_id, title, description, question_date) 
	values (9, 10, 'What country’s flag is the most controversial?', 'This may seem odd, but I would like to hear the internets opinion.',  '2019-10-19');
insert into question (id, user_id, title, description, question_date) 
	values (10, 9, 'Who is handling the coronavirus outbreak better, the United States or Canada?', 'Im a proud American and Ill be damned if Canada is handeling it better >:(',  '2020-03-03');
insert into question (id, user_id, title, description, question_date) 
	values (11, 2, 'Paging a collection with LINQ', 'How do you page through a collection in LINQ given that you have a startIndex and a count?',  '2019-06-03');
insert into question (id, user_id, title, description, question_date) 
	values (12, 11, 'Microsoft office 2007 file type, mime types and identifying characters', 'Where can I find a list of all of the MIME types and the identifying characters for Microsoft Office 2007 files?',  '2019-06-12');	

-- answers
insert into answer (id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer) 
	values (1, 1, 1, '2019-12-13', 'Undoubtedly the worst form of over-the-top method acting is the kind that a) makes you look like an ass, and b) was for a terrible film. We’ve already shared some of the stories of Jared Leto’s Joker-prep for Suicide Squad, in which the actor famously tormented his co-workers for the sake of a half-written and pandering story. But there’s so much more.', 3, 2, FALSE);
insert into answer (id, user_id, question_id, answer_date, content, nr_likes, nr_dislikes, marked_answer) 
	values (2, 3, 2, '2019-12-01', 'An intelligent person knows so much that it knows nothing, leaves you hanging upside down, mouthing knowledge as your heart falls out of your mouth - Anne. But, a wise man knows when to use his intelligence. He knows when to be silent.', 7, 4, FALSE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (3, 4, 3, '2020-01-12', 'There are lots of jerks in music. People like Gene Simmons and Morrissey are well-known jerks.', FALSE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (4, 2, 4, '2019-05-01', 'I’m glad you realize there is a difference, because many people don’t. When you do something daily, let’s say, then you do it every day. Every. Day. Two words. Two separate words. “Every day” means, refers to, and includes all days, just like “every cantaloupe” means, refers to, and includes all cantaloupes. You get the idea. When something is commonplace, ordinary, mundane, routine, average, run-of-the-mill, plain, or typical, then it can be accurately described as everyday. One word. One. “Everyday” is an adjective, a descriptor.', TRUE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (5, 5, 5, '2020-02-05', 'There never was a breach. BOTH two sides of the SAME coin. Science asks "how", religion asks "why".', FALSE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (6, 6, 6, '2019-10-01', 'First of all, Apple AirPods are not hype, they are the real deal with near unparalleled Bluetooth pairing and connectivity, excellent sound, good fit and reasonable cost. AirPods 2 are quite sufficient and nearly as good all around as the Pro version. You can spend MORE for better sound, not necessarily better Bluetooth. The only drawback to iPhone/AirPods connection is that Apple only offers 1 Bluetooth codec, and not AptX or AptX HD. Knockoffs of nearly anything are not as satisfying, or as quality as the Original! There are other earbuds out there, but you will risk the one element that is essential: Bluetooth connectivity, and pairing, regardless of upgrades.', TRUE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (7, 7, 7, '2020-11-05', 'Take a look at Process and Runtime classes. Keep in mind that what you are trying to accomplish is probably not platform independent.', FALSE);
insert into answer (id, user_id, question_id, answer_date, content, marked_answer) 
	values (8, 9, 8, '2020-03-26', 'BREAKING BAD! This is the best TV show on earth. It builds up slowly but methodically to expand over several seasons. I was amazed by the storytelling. Every piece slowly falls into place to create a grand finale that has been mastered to blow your mind away.', FALSE);

--comments
insert into comment (id, user_id, question_id, answer_id, comment_date, content) 
	values (1, 3, 1, NULL, '2019-12-07', 'I believe it would also be interesting if people commented on the worse method actors as well.');
insert into comment (id, user_id, question_id, answer_id, comment_date, content) 
	values (2, 4, 10, NULL, '2020-03-21', 'You should not compare the health strength of two countries during these hard times! Dislike!');
insert into comment (id, user_id, question_id, answer_id, comment_date, content) 
	values (3, 1, NULL, 8, '2020-03-27', 'I agree! Awesome dialogue, great choice of actors and awesome camera shots. The perfect drama for sure.');
insert into comment (id, user_id, question_id, answer_id, comment_date, content) 
	values (4, 6, 9, NULL, '2020-03-28', 'Well, that is a rather wird question, but in a good way though.');
insert into comment (id, user_id, question_id, answer_id, comment_date, content) 
	values (5, 9, NULL, 2, '2020-03-28', 'Impecable! What a good answer. Like!');
