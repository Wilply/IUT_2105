<?php 
#session_start();
  if (!isset($_SESSION['login'])) {
    header("Location: ./");
  };

  $db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

  $req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

  $userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

  if ($userisAdmin == 0) {
    header('Location: ./user_panel.php');
  };

  $req_cat = 'SELECT cat_id, cat_name FROM categories';

  $res_cat = mysqli_query($db_connect, $req_cat);
?>

<div class="add_cat_main">
  <div>
      <form method="POST" action="cat_processin.php">
        <h1>Ajout d'une catégorie</h1>
        Nom de la catégorie :<br>
        <input type="text" name="cat_name" maxlength=50 required><br>
        <input id="add_cat_valider" type="submit" value="Valider">
      </form>
    </div>
    <div>
        <form method="POST" action="cat_processin.php">
        <h1>Ajout d'une sous catégorie</h1>
        Nom de la sous catégorie : <br>
        <input type="text" name="sub_cat_name" maxlength=50 required><br>
        Categories Parente : <br>
        <select name="cat_parent_id" required>
          <option disabled selected value>-- CATEGORIES -- </option>
          <?php
            for ($i = 0; $i < mysqli_num_rows($res_cat); $i++) {
                $res = mysqli_fetch_array($res_cat);
                echo '<option value="'.$res[0].'">'.$res[1].'</option>';
              }  
          ?>
        </select>
        <Br><input id="add_cat_valider" type="submit" value="Valider">
      </form>
  </div>
</div>