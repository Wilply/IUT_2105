select commande_id, sum(mult)
from (

select commande_id, quantite*product_price as mult
from commandes, products 
where commandes.product_id = products.product_id);
