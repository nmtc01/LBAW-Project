--DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;

--CREATE TABLE users (
 -- id SERIAL PRIMARY KEY,
 -- name VARCHAR NOT NULL,
 -- email VARCHAR UNIQUE NOT NULL,
 -- password VARCHAR NOT NULL,
--  remember_token VARCHAR
--);
        /*'name', 'email', 'password',*/


--INSERT INTO users VALUES (
--  DEFAULT,
--  'John Doe',
--  'john@example.com',
--  '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W'
--); -- Password is 1234. Generated using Hash::make('1234')

CREATE TABLE "user" (
    id              SERIAL          AUTOINCREMENT PRIMARY KEY,
    first_name      TEXT            NOT NULL,
    last_name       TEXT            NOT NULL,
    email           TEXT            NOT NULL UNIQUE,
    bio             TEXT,
    username        TEXT            NOT NULL UNIQUE,
    password        TEXT            NOT NULL,
    score           INTEGER         NOT NULL DEFAULT 0              
);

-- password for user 2: mega_pass 
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (1, 'Nuno', 'Cardoso', 'nmtc01@hotmail.com', 'UP student', 'nmtc01', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');
insert into "user" (id, first_name, last_name, email, bio, username, password)
	values (2, 'Pedro', 'Dantas', 'pedrodantas@hotmail.com', 'UP student', 'pedrodantas', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W');