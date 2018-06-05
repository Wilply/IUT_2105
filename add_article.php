<?php
session_start();

function secure_input($string, $db) {
  $string = mysqli_real_escape_string($db, $string);
      $string = addcslashes($string, '%_');
      return $string;
  }

function insert_db($nom, $prix, $short_descri, $descri, $img_link, $db) {
  $result = true;
  $value = "\"".$nom."\",\"".$prix."\",\"".$short_descri."\",\"".$descri."\",\"".$img_link."\"";
  $requete = "INSERT INTO users (user_login, user_name, user_surname, user_password, user_mail, user_is_admin) VALUES (".$value.")";
  #echo $requete;
  $res = mysqli_query($db, $requete);
};

$isOk = true;
$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");
if (!$db_connect) {
  #echo "Connot connect to mysql server";
  $isOk =  false;
};

$nom = $_POST['NomProd'];
$prix = $_POST['PrixProd'];
$short_descri = $_POST['ShortDescri'];
$descri = $_POST['Descri'];
$img_link = $_FILES['img_link']['name'];
$img_type = $_FILES['img_link']['type'];
$img_dir = $_FILES['img_link']['tmp_name'];
$img_size = $_FILES['img_link']['size'];


echo $nom."<Br>";
echo $prix."<Br>";
echo $short_descri."<Br>";
echo $descri."<Br>";
echo $img_link."<Br>";
echo $img_type."<Br>";
echo $img_dir."<Br>";
echo $img_size."<Br>";

if ($img_dir) {
  if ($img_size > 102400) {
    header('Location: fail.html');
  }
} else {

};
?>
