PRAGMA foreign_keys = off;

-- Table: user
DROP TABLE IF EXISTS user;
CREATE TABLE user (
    user_id         SERIAL          PRIMARY KEY,
    first_name      TEXT            NOT NULL,
    last_name       TEXT            NOT NULL,
    email           TEXT            NOT NULL UNIQUE,
    description     TEXT,
    username        TEXT            NOT NULL UNIQUE,
    password        TEXT            NOT NULL,
    score           INTEGER         NOT NULL DEFAULT 0              
);

-- Table: label
DROP TABLE IF EXISTS label;
CREATE TABLE label (
    label_id        SERIAL          PRIMARY KEY,
    name            TEXT            NOT NULL          
);

-- Table: notification
DROP TABLE IF EXISTS notification;
CREATE TABLE notification (
    notification_id SERIAL          PRIMARY KEY,
    content         TEXT            NOT NULL,
    date            DATE            DEFAULT 'today' NOT NULL,
    viewed          BOOLEAN         DEFAULT FALSE NOT NULL,
    user_id         INTEGER         REFERENCES "user" (user_id) NOT NULL
);

-- Table: user_management
DROP TABLE IF EXISTS user_management;
CREATE TABLE user_management (
    management_id   SERIAL          PRIMARY KEY,
    state           TEXT            DEFAULT 'active' NOT NULL,
    status          TEXT            DEFAULT 'user' NOT NULL,
    user_id         INTEGER         REFERENCES "user" (user_id) NOT NULL
);

-- Table: moderator
DROP TABLE IF EXISTS moderator;
CREATE TABLE moderator (
    moderator_id     INTEGER         REFERENCES "user" (user_id) NOT NULL
);

-- Table: administrator
DROP TABLE IF EXISTS administrator;
CREATE TABLE administrator (
    administrator_id INTEGER         REFERENCES "moderator" (moderator_id) NOT NULL
);

-- Table: question
DROP TABLE IF EXISTS question;
CREATE TABLE question (
    question_id     SERIAL          PRIMARY KEY,
    user_id         INTEGER         REFERENCES "user" (user_id) NOT NULL,
    title           TEXT            NOT NULL,
    description     TEXT            NOT NULL,
    nr_likes        INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes     INTEGER         DEFAULT 0 NOT NULL,
    question_date   DATE            DEFAULT 'today' NOT NULL           
);

-- Table: answer
DROP TABLE IF EXISTS answer;
CREATE TABLE answer (
    answer_id        SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (user_id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (question_id) NOT NULL,
    answer_date      DATE            DEFAULT 'today' NOT NULL,
    content          TEXT            NOT NULL,
    nr_likes         INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes      INTEGER         DEFAULT 0 NOT NULL
);

-- Table: comment
DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    comment_id       SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (user_id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (question_id),
    answer_id        INTEGER         REFERENCES "answer" (answer_id),
    comment_date     DATE            DEFAULT 'today' NOT NULL,
    content          TEXT            NOT NULL,
    CHECK (
        (question_id IS NOT NULL AND answer_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL)
    )
);

-- Table: vote
DROP TABLE IF EXISTS vote;
CREATE TABLE vote (
    vote_id          SERIAL          PRIMARY KEY,
    like             BOOLEAN          NOT NULL,
    dislike          BOOLEAN          NOT NULL,
    user_id          INTEGER         REFERENCES "user" (user_id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (question_id),
    answer_id        INTEGER         REFERENCES "answer" (answer_id),
    CHECK (
        (question_id IS NOT NULL AND answer_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL)
    )
);

-- Table: report
DROP TABLE IF EXISTS report;
CREATE TABLE report (
    report_id        SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (user_id),
    question_id      INTEGER         REFERENCES "question" (question_id),
    answer_id        INTEGER         REFERENCES "answer" (answer_id),   
    comment_id       INTEGER         REFERENCES "comment" (comment_id),
    CHECK(
        (user_id IS NOT NULL AND question_id IS NULL AND answer_id IS NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NOT NULL AND answer_id IS NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NULL AND answer_id IS NOT NULL AND comment_id IS NULL) OR
        (user_id IS NULL AND question_id IS NULL AND answer_id IS NULL AND comment_id IS NOT NULL)
    )
);

-- Table: report_status
DROP TABLE IF EXISTS report_status;
CREATE TABLE report_status (
    status_id        SERIAL          PRIMARY KEY,
    report_id        INTEGER         REFERENCES "report" (report_id) NOT NULL,
    state            TEXT            DEFAULT 'unresolved' NOT NULL,
    comment          TEXT,
    responsible_user INTEGER         REFERENCES "moderator" (moderator_id) NOT NULL
);

-- Table: marked_answer
DROP TABLE IF EXISTS marked_answer;
CREATE TABLE marked_answer (
    question_id      INTEGER         REFERENCES "question" (question_id) NOT NULL,
    answer_id        INTEGER         REFERENCES "answer" (answer_id) NOT NULL
);

-- Table: following
DROP TABLE IF EXISTS following;
CREATE TABLE following (
    user_id          INTEGER         REFERENCES "user" (user_id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (label_id) NOT NULL
);

-- Table: about
DROP TABLE IF EXISTS about;
CREATE TABLE about (
    question_id      INTEGER         REFERENCES "question" (question_id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (label_id) NOT NULL
);

