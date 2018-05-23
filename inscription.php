<?php
	
	$db_connect = mysqli_connect("127.0.0.1", "root", "toto", "db_clecoq001");

	function secure_input($string) {
		$string = mysqli_real_escape_string($db_connect, $string);
        $string = addcslashes($string, '%_');
        return $string;
    }

	$nom = secure_input($_POST['nom']);
	$prenom = secure_input($_POST['prenom']);
	$login = secure_input($_POST['login']);
	$password = secure_input($_POST['password']);
	$confirm_password = secure_input($_POST['confirm_password']);
	$email = secure_input($_POST['email']);
	$confirm_email = secure_input($_POST['confirm_email']);

	$isOk = true;

	if($password != $confirm_password) {
		$isOk = false;
	} elseif ($email != $confirm_email) {
		$isOk = false;
	};

	if($isOk) {
		echo "OK";
	} else {
		echo "NOT OK";
	};
?>