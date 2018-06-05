<?php
session_start();

function secure_input($string, $db) {
  $string = mysqli_real_escape_string($db, $string);
      $string = addcslashes($string, '%_');
      return $string;
  }

function insert_db($login, $nom, $prenom, $password, $email, $db) {
  $result = true;
  $password = password_hash($password, PASSWORD_DEFAULT);
  $isAdmin = "false";
  $value = "\"".$login."\",\"".$nom."\",\"".$prenom."\",\"".$password."\",\"".$email."\",".$isAdmin;
  $requete = "INSERT INTO users (user_login, user_name, user_surname, user_password, user_mail, user_is_admin) VALUES (".$value.")";
  #echo $requete;
  $res = mysqli_query($db, $requete);
};
 
 ?>
