<?php
  session_start();
  if (!isset($_SESSION['login'])) {
    header("Location: ./");
  };

  $db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

  $req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

  $userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

  if ($userisAdmin == 0) {
    header('Location: ./user_panel.php');
  };

  if (isset($_POST['cat_name'])) {
    $req = 'INSERT INTO categories(cat_name) VALUES ("'.$_POST['cat_name'].'")';
  } elseif (isset($_POST['sub_cat_name']) and isset($_POST['cat_parent_id'])) {
    $req = 'INSERT INTO sub_categories(subcat_name, subcat_parent_id) VALUES ("'.$_POST['sub_cat_name'].'","'.$_POST['cat_parent_id'].'")';
  } else {
    header('Location: admin_panel.php?page=4');
  }

  $res = mysqli_query($db_connect, $req);

  if ($res) {
    header('Location: admin_panel.php?page=4');
  } else {
    header('Location: fail.html');
  }
?>
