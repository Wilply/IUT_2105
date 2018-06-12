<?php
  #session_start();
  /*if (!isset($_SESSION['login'])) {
    header("Location: ./");
  };*/

  $db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

  #$req_sub_cat = 'SELECT subcat_id, subcat_name FROM sub_categories';

  #$res_sub_cat = mysqli_query($db_connect, $req_sub_cat);

  $req_cat = 'SELECT cat_id, cat_name FROM categories';

  $res_cat = mysqli_query($db_connect, $req_cat);

  #onclick=\"location.href='article.php?article_id=".$id_produit."';\" style=\"cursor: pointer;\"
?>
<!--
<div class="menu">
  <div id="first_prim" class="prim_cat">
    <p class="prim_text">CATEGORIES</p>
  </div>
  <div class="prim_cat">
    <p class="prim_text">CHAUSETTE</p>
    <div class="sub_cat">
      <a href="">ROUGE</a>
      <a href="">RAYE</a>
      <a href="">EN BOIS</a>
    </div>
  </div>
  <div class="prim_cat">
    <p class="prim_text">POISSON</p>
    <div class="sub_cat">
      <a href="">NEMO</a>
      <a href="">DORIE</a>
      <a href="">POSKAILLE</a>
      <a href="">KRALAMOUR</a>
    </div>
  </div>
  <div class="prim_cat">
    <p class="prim_text">ANIMAUX</p>
    <div class="sub_cat">
      <a href="">IUT G1</a>
      <a href="">IUT G2</a>
      <a href="">GIGABYTE</a>
    </div>
  </div>
</div>
-->
<div class="menu">
<?php
while ($row_cat = mysqli_fetch_array($res_cat)) {
      if ($row_cat[0] == 1) {
        echo '<div id="first_prim" class="prim_cat" onclick="location.href=\'index.php?cat='.$row_cat[0].'\'">';
      } else {
        echo '<div class="prim_cat" onclick="location.href=\'index.php?cat='.$row_cat[0].'\'">';
      }
      echo '<p class="prim_text">'.$row_cat[1].'</p>';
      $req_sub_cat = 'SELECT subcat_id, subcat_name FROM sub_categories WHERE subcat_parent_id = '.$row_cat[0];
      echo '<div class="sub_cat">';
      $res_sub_cat = mysqli_query($db_connect, $req_sub_cat);
      while ($row_sub_cat = mysqli_fetch_array($res_sub_cat)) {
          echo '<a href="index.php?subcat='.$row_sub_cat[0].'">'.$row_sub_cat[1].'</a>';
      }
      echo '</div>';
      echo '</div>';
}
?>
</div>
