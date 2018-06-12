USE db_clecoq001;

INSERT INTO categories (cat_name) VALUES ('ANIMAUX');

INSERT INTO sub_categories (subcat_name, subcat_parent_id) VALUES ('Animaux d\'interieur', 1);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Escargot', '2','Petit escargot pour vos jardins','Petit escargot qui s adapte a tous types de de jardins et de vegetations. Il est hermaphrodite et donc n\'a pas besoin d\'un congenaire pour perpetuer son espece.', 1);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Lezard', '7', 'Lezard de taille moyenne (5cm)', 'Lezard pour vivarium a alimenter avec des aliments BIO et que de la nourriture de mangeur de salade de vegan.', 1);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Dorade', '50', 'Petite DORADE d\'interieur bleue', 'La dorade est un animal d\'interieur qui s\'adapte a tous types d\'environnements. Elle vit en eau douce', 1);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Poisson Rouge', '70','Petit poisson d\'interieur','Ce genre de petit poisson rouge epice m\'amene, il broute de la pelouse comme des petites chevres', 1);




INSERT INTO categories (cat_name) VALUES ('EMBALLAGES');

INSERT INTO sub_categories (subcat_name, subcat_parent_id) VALUES ('Carton', 2);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Carton Eco-responsable', '20', 'Carton pour emballage d\'objets de petite taille', 'Ce carton est un carton qui respecte l\'environnement car il est ondule et compose a 100% de materiaux responsables et donc recyclables', 2);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Carton Basique', '10', 'Carton basique pour emballage d\'objets de taille moyenne', 'Ce carton permet d\'emballer des objets de taille moyenne. Il permet une securite lors d\'un transport d\'objets', 2);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Papier Bulle', '7', 'Papier de protection', 'Papier qui amortit les chocs lors des transports ou des livraisons d\'objets de tout type.', 2);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('Polystyrene', '5', 'Emballage de polystyrene', 'Emballage qui se constitue en petits morceaux de polystyrene qui permet une absorbtion des chocs dus a des transports.', 2);





INSERT INTO categories (cat_name) VALUES ('Ordinateurs');

INSERT INTO sub_categories (subcat_name, subcat_parent_id) VALUES ('Fixes', 3);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('PC Bureautique', '800', 'Pc pour la bureautique', 'Pc constitue de composants choisis specifiquements pour la bureautique', 3);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('PC Gamer', '1200', 'PC POUR LES JEUX', 'PC constitue de composants specifiques pour les gros gamers', 3);

INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('PC Bureautique', '800', 'Pc pour la bureautique', 'Pc constitue de composants choisis specifiquements pour la bureautique', 3);
INSERT INTO products (product_name, product_price, product_short_description, product_description, product_sub_cat) VALUES ('PC Gamer', '1200', 'PC POUR LES JEUX', 'PC constitue de composants specifiques pour les gros gamers', 3);

COMMIT;
