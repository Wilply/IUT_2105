<?php
$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

$id_produit = 1;
$req_produit = "SELECT * FROM products WHERE product_id =".$id_produit;
$produit = mysqli_fetch_array(mysqli_query($db_connect, $req_produit));

$img = $produit[5];
?>
<div class="article">
  <div class="article_list_left">
    <div class="article_list_image">
      <?php if ($img) {
        echo $img;
        echo "<img classe=\"image\" src=\"".$img."\" >";
      } else {?>
        <img class="image" src="no_img.png">
      <?php }; ?>
    </div>
    <p class="article_list_price"></p>
  </div>
  <div class="article_list_right">
    <p class="article_list_price"></p>
    <p class="article_list_short_description"></p>
  </div>
</div>
