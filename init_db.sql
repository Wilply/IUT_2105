#script de creation et d initialisation de la base de donnée
#pour lancer le script: source init_db.sql

DROP DATABASE IF EXISTS db_clecoq001;

CREATE DATABASE db_clecoq001;

USE db_clecoq001;

DROP TABLE IF EXISTS sub_categories;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;

CREATE TABLE users(
  user_id INT NOT NULL AUTO_INCREMENT,
  user_login VARCHAR(10) NOT NULL,
  user_name VARCHAR(30) NOT NULL,
  user_surname VARCHAR(40) NOT NULL,
  user_password VARCHAR(100) NOT NULL,
  user_mail VARCHAR(50) NOT NULL,
  user_is_admin BOOLEAN NOT NULL,
  CONSTRAINT users_key PRIMARY KEY(user_id)
);

#ajout d un utilisateur administrateur pour la 1er connexion
INSERT INTO users (user_login, user_name, user_surname, user_password, user_mail, user_is_admin)
 VALUES ("root","none","none","$2y$10$e0dmaJN52NRuH/c7FYW6teTZiagUEm7/4BLfxr0WLBbQuuj1uPdTa","root@email.fr",true);

CREATE TABLE categories (
  cat_id INT NOT NULL AUTO_INCREMENT,
  cat_name VARCHAR(50) NOT NULL,
  CONSTRAINT categories_key PRIMARY KEY(cat_id)
);

CREATE TABLE sub_categories (
  subcat_id INT NOT NULL AUTO_INCREMENT,
  subcat_name VARCHAR(50) NOT NULL,
  subcat_parent_id INT,
  CONSTRAINT sub_categories_key PRIMARY KEY(subcat_id)
);

CREATE TABLE products (
  product_id INT NOT NULL AUTO_INCREMENT,
  product_name VARCHAR(50) NOT NULL,
  product_price DECIMAL(8,2) NOT NULL,
  product_short_description TEXT,
  product_description TEXT,
  product_img VARCHAR(30),
  product_sub_cat INT,
  CONSTRAINT products_key PRIMARY KEY(product_id),
  CONSTRAINT products_foreign_sub_cat FOREIGN KEY(product_sub_cat) REFERENCES sub_categories(subcat_id)
);

#Ajout d un prduit
INSERT INTO products (product_name, product_price, product_short_description, product_description) VALUES ("VINCENT", "30", "animal de type singe", "PRIMATES n. m. pl. XVIIIe siècle, au pluriel, primats ; XIXe siècle, primates. Emprunté du latin scientifique primates, de même sens, lui-même dérivé de primas, « qui est au premier rang ; notable ».ZOOL. Ordre de mammifères placentaires caractérisés par des yeux frontaux qui permettent une vision binoculaire, des membres à cinq doigts aux ongles plats ainsi que des mains préhensiles au pouce opposable. L'ordre des Primates comprend les Prosimiens et les Simiens, que l'on subdivise en Catarhiniens et Platyrhiniens. Les ouistitis, les chimpanzés, les gorilles, les orangs-outans, les gibbons, les babouins font partie des Primates. Au singulier. L'homme est un primate appartenant à la famille des Hominidés. Fig. et fam. S'emploie au singulier pour désigner un homme grossier, fruste.");

COMMIT;
