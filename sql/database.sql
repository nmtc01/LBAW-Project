-- Table: user
DROP TABLE IF EXISTS "user" CASCADE;
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
DROP TABLE IF EXISTS label CASCADE;
CREATE TABLE label (
    id              SERIAL          PRIMARY KEY,
    name            TEXT            NOT NULL          
);

-- Table: notification
DROP TABLE IF EXISTS notification CASCADE;
CREATE TABLE notification (
    id              SERIAL          PRIMARY KEY,
    content         TEXT            NOT NULL,
    date            DATE            DEFAULT 'Now' NOT NULL,
    viewed          BOOLEAN         DEFAULT FALSE NOT NULL,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL
);

-- Table: user_management
DROP TABLE IF EXISTS user_management CASCADE;
CREATE TABLE user_management (
    id              SERIAL          PRIMARY KEY,
    status          TEXT            DEFAULT 'user' NOT NULL,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL UNIQUE
);

-- Table: question
DROP TABLE IF EXISTS question CASCADE;
CREATE TABLE question (
    id              SERIAL          PRIMARY KEY,
    user_id         INTEGER         REFERENCES "user" (id) NOT NULL,
    title           TEXT            NOT NULL,
    description     TEXT            NOT NULL,
    nr_likes        INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes     INTEGER         DEFAULT 0 NOT NULL,
    question_date   DATE            DEFAULT 'Now' NOT NULL        
);

-- Table: answer
DROP TABLE IF EXISTS answer CASCADE;
CREATE TABLE answer (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id) NOT NULL,
    answer_date      DATE            DEFAULT 'Now' NOT NULL,
    content          TEXT            NOT NULL,
    nr_likes         INTEGER         DEFAULT 0 NOT NULL,
    nr_dislikes      INTEGER         DEFAULT 0 NOT NULL,
    marked_answer    BOOLEAN         DEFAULT FALSE NOT NULL   
);

-- Table: comment
DROP TABLE IF EXISTS comment CASCADE;
CREATE TABLE comment (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    question_id      INTEGER         REFERENCES "question" (id),
    answer_id        INTEGER         REFERENCES "answer" (id),
    comment_date     DATE            DEFAULT 'Now' NOT NULL,
    content          TEXT            NOT NULL,
    CHECK (
        (question_id IS NOT NULL AND answer_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL)
    )
);

-- Table: vote
DROP TABLE IF EXISTS vote CASCADE;
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
DROP TABLE IF EXISTS report CASCADE;
CREATE TABLE report (
    id               SERIAL          PRIMARY KEY,
    user_id          INTEGER         REFERENCES "user" (id),
    question_id      INTEGER         REFERENCES "question" (id),
    answer_id        INTEGER         REFERENCES "answer" (id),   
    comment_id       INTEGER         REFERENCES "comment" (id),
    CHECK(
        (question_id IS NOT NULL AND answer_id IS NULL AND comment_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NOT NULL AND comment_id IS NULL) OR
        (question_id IS NULL AND answer_id IS NULL AND comment_id IS NOT NULL)
    )
);

-- Table: report_status
DROP TABLE IF EXISTS report_status CASCADE;
CREATE TABLE report_status (
    id               SERIAL          PRIMARY KEY,
    report_id        INTEGER         REFERENCES "report" (id) NOT NULL,
    state            TEXT            DEFAULT 'unresolved' NOT NULL,
    comment          TEXT,
    responsible_user INTEGER         REFERENCES "user_management" (user_id) NOT NULL
);

-- Table: following
DROP TABLE IF EXISTS following CASCADE;
CREATE TABLE following (
    user_id          INTEGER         REFERENCES "user" (id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) NOT NULL
);

-- Table: about
DROP TABLE IF EXISTS about CASCADE;
CREATE TABLE about (
    question_id      INTEGER         REFERENCES "question" (id) NOT NULL,
    label_id         INTEGER         REFERENCES "label" (id) NOT NULL
);