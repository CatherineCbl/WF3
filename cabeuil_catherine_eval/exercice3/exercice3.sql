CREATE DATABASE IF NOT EXISTS exercice_3;

USE exercice_3;

CREATE TABLE movies(
    id_film INT(3) NOT NULL AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    actors VARCHAR(150) NOT NULL,
    director VARCHAR(20) NOT NULL,
    producer VARCHAR(20) NOT NULL,
    year_of_prod YEAR(4) NOT NULL,
    language VARCHAR(15) NOT NULL,
    category ENUM('drame','romance','action','thriller','comédie','horreur','fantastique') NOT NULL,
    storyline TEXT(350) NOT NULL,
    video VARCHAR(80) NOT NULL,
    PRIMARY KEY(id_film)
)ENGINE=InnoDB;
