#script de creation et d'initialisation de la base de donnée
#pour lancer le script: source init_db.sql

DROP DATABASE IF EXISTS site_db;

CREATE DATABASE site_db;

USE site_db;

DROP TABLE IF EXISTS users;

CREATE TABLE users(
  user_id INT NOT NULL,
  user_login VARCHAR(10) NOT NULL,
  user_name VARCHAR(30) NOT NULL,
  user_surname VARCHAR(40) NOT NULL,
  user_password VARCHAR(40) NOT NULL,
  user_mail VARCHAR(50) NOT NULL,
  user_is_admin BOOLEAN NOT NULL);

#ajout d'un utilisateur administrateur pour la 1er connexion
INSERT INTO users VALUES(0,"root","none","none","toto","root@email.fr",true);

DROP TABLE IF EXISTS products;

CREATE TABLE products (
  product_id INT NOT NULL,
  product_name VARCHAR(50) NOT NULL,
  producs_price DECIMAL(8,2) NOT NULL,
  product_short_description TEXT,
  product_description TEXT);

COMMIT;
