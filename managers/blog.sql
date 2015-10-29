DROP DATABASE IF EXISTS blog;
CREATE DATABASE blog;
use blog;

DROP TABLE IF EXISTS user;
CREATE TABLE user(
id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
login varchar(60),
pass varchar(512)
)ENGINE=InnoDB;




DROP TABLE IF EXISTS article;
CREATE TABLE article(
idA int(11) PRIMARY KEY NOT NULL,
titre varchar(255) NOT NULL,
texte text NOT NULL,
extensionImage char(3)
)ENGINE=InnoDB;




INSERT INTO user values(1,'maxime',SHA1('maxime'));
