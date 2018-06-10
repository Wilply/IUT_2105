<?php
$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

$req_last_produit = "SELECT product_id FROM products ORDER BY product_id DESC";

$last_id = mysqli_fetch_array(mysqli_query($db_connect, $req_last_produit))[0];

for ($i=1; $i <= $last_id; $i++) {

  $id_produit = $i;

  $req_produit = "SELECT * FROM products WHERE product_id =".$id_produit;
  $produit = mysqli_fetch_array(mysqli_query($db_connect, $req_produit));

  $img = $produit[5];
  $prix = $produit[2];
  $descri = $produit[3];
  $nom = $produit[1];

echo "<div class=\"article\" onclick=\"location.href='article.php?article_id=".$id_produit."';\" style=\"cursor: pointer;\">";?>
  <div class="article_list_left">
      <?php if (isset($img)) {
        #echo $img;
        echo "<img class=\"article_image\" src=\"".$img."\" >";
      } else {?>
        <img class="article_image" src="no_img.png">
      <?php }; ?>
  </div>
  <div class="article_list_right">
    <p class="article_list_name"><?php echo $nom; ?></p>
    <p class="article_list_short_description"><?php echo $descri; ?></p>
  </div>
    <div class="article_list_price">
      Prix unitaire : <Br>
      <?php echo $prix; ?>
      euros
    </div>
</div>
<?php }; ?>
