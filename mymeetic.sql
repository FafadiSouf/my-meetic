DROP DATABASE IF EXISTS mymeetic;
CREATE DATABASE mymeetic;

USE mymeetic;

DROP TABLE IF EXISTS user; 
DROP TABLE IF EXISTS hobbies; 

CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    lastname      VARCHAR(255)    NOT NULL,
    firstname     VARCHAR(255)    NOT NULL,
    gender        VARCHAR(50),
    birthdate     DATE        NOT NULL,
    email         VARCHAR(255)    NOT NULL UNIQUE,
    city          VARCHAR(255),
    password      VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE hobbies(
    hobbies_id      INT             NOT NULL AUTO_INCREMENT,
    hobbies_name    VARCHAR(255)    NOT NULL,
    PRIMARY KEY (hobbies_id)
);

CREATE TABLE user_hobbies (
    user_id         INT         NOT NULL,
    hobbies_id      INT         NOT NULL,
    PRIMARY KEY (user_id, hobbies_id),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (hobbies_id) REFERENCES hobbies(hobbies_id)
);

INSERT INTO user (lastname, firstname, gender, birthdate, email, city, password) 
VALUES 
('Rafadhia', 'Houmadi', 'female', '2001-08-15', 'rafadhia.houmadi@gmail.com', 'Lyon', 'hashe_password'),
('Chamsane', 'Mhadji', 'female', '2002-02-25', 'chamsane.mhadji@gmail.com', 'Montpellier', 'hashe_password'),
('Saidi', 'Moudallah', 'male', '2001-03-30', 'saidi.moudallah@gmail.com', 'Rennes', 'hashe_password'),
('Hadidja', 'Mhadji', 'female', '2001-01-28', 'hadidja.mhadji@gmail.com', 'Toulouse', 'hashe_password');

--INSERT les hobbies
INSERT INTO hobbies(hobbies_name) 
VALUES
('cuisine'),
('football'),
('Lecture'),
('Voyage');

--Associe les hobbies
INSERT INTO user_hobbies(user_id, hobbies_id)
VALUES
(1, 1), -- Rafadhia aime la cuisine
(1, 4), -- Rafadhia aime aussi le voyage
(2, 3), -- Chamsane aime la lecture
(3, 2), -- Saidi aime le football
(4, 4); -- Hadidja aime le voyage 
