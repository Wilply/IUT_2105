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
  $requete = "INSERT INTO products (product_name, product_price, product_short_description, product_description, product_img) VALUES (".$value.")";
  #echo "<Br>".$requete;
  $res = mysqli_query($db, $requete);
  return $res;
};

$isOk = true;
$img = true;

$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");
if (!$db_connect) {
  #echo "Connot connect to mysql server";
  $isOk =  false;
};

if ($isOk) {
  $nom = secure_input($_POST['NomProd'], $db_connect);
  $prix = secure_input($_POST['PrixProd'], $db_connect);
  $short_descri = secure_input($_POST['ShortDescri'], $db_connect);
  $descri = secure_input($_POST['Descri'], $db_connect);

  $img_link = $_FILES['img_link']['name'];
  $img_type = $_FILES['img_link']['type'];
  $img_dir = $_FILES['img_link']['tmp_name'];
  $img_size = $_FILES['img_link']['size'];
  $img_error_code = $_FILES['img_link']['error'];
}
$img_extension = substr($img_type,6,strlen($img_type)-6);
#echo "<Br>".$img_extension;
$img_type = substr($_FILES['img_link']['type'],0,5);
#echo "<Br>".$img_type;

if ($img_type != "image") {
  $img = false;
};

/*
echo $nom."<Br>";
echo $prix."<Br>";
echo $short_descri."<Br>";
echo $descri."<Br>";
echo $img_link."<Br>";
echo $img_type."<Br>";
echo $img_dir."<Br>";
echo $img_size."<Br>";
echo $img_error_code."<Br>";
echo $img_extension."<Br>";*/


#test si le dossier d upload existe ou le creer
/*if (!file_exists("./upload/images")) {
  echo 'Le dossier n existe pas<Br>';
  #header('Location: fail.html');
};*/


if ($img_error_code == 0 && $isOk && $img) {
  if ($img_size > 102400 or !file_exists("./upload/images")) {
    header('Location: fail.html');
  };
  $id = md5(uniqid(rand(), true));
  #echo "<Br>".$img_extension;
  $nom_local = "upload/images/".$id.".".$img_extension;
  #echo "<Br>".$nom_local;
  $isUpload = move_uploaded_file($img_dir,$nom_local);
  if (!$isUpload) {
    header('Location: fail.html');
    #echo "c est pas upload";
  };
} elseif ($isOk) {
  $nom_local = "no_img.png";
  #echo 'pas d image';
};

if ($isOk) {
  #echo 'enter insert loop';
  $insert = insert_db($nom, $prix, $short_descri, $descri, $nom_local, $db_connect);
  if ($insert) { 
  #echo 'insert succes';
  header('Location: ./');
  } else {
    header('Location: fail.html');
  };
};
?>
