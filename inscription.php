<?php
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

	function get_user($db) {
		$requete = "select * from users";
		$res = mysqli_query($db, $requete);
		for ($i = 1; $i <= mysqli_num_rows($res); $i++) {
			echo "<Br>";
			$data = mysqli_fetch_array($res);
			for ($j = 0; $j < 7; $j++) {
				echo $data[$j]."		";	
			}
		}
	};

	function test_login_mail($login, $mail, $db) {
		$isOk = true;
		$req_login = "SELECT user_login FROM users WHERE user_login=\"".$login."\"";
		$req_mail = "SELECT user_mail FROM users WHERE user_mail=\"".$mail."\"";
		$row_login = mysqli_num_rows(mysqli_query($db, $req_login));
		$row_mail = mysqli_num_rows(mysqli_query($db, $req_mail));
		#echo "<Br>mail :".$row_mail;
		#echo "<Br>login :".$row_login;
		if (($row_login + $row_mail) > 0) {
			$isOk = false;
			#echo '<Br>il ya sup 0';
		};
		#echo $isOk ? 'true' : 'false';
		return $isOk;
	}

	$isOk = true;

	$db_connect = mysqli_connect("localhost", "toto", "totopwd", "db_clecoq001");
	if (!$db_connect) {
		#echo "Connot connect to mysql server";
		$isOk =  false;
	};

	$nom = secure_input($_POST['nom'], $db_connect);
	$prenom = secure_input($_POST['prenom'], $db_connect);
	$login = secure_input($_POST['login'], $db_connect);
	$password = secure_input($_POST['password'], $db_connect);
	$confirm_password = secure_input($_POST['confirm_password'], $db_connect);
	$email = secure_input($_POST['email'], $db_connect);
	$confirm_email = secure_input($_POST['confirm_email'], $db_connect);

	if($password != $confirm_password) {
		$isOk = false;
		#echo "<Br>2 pass diff";
	} elseif ($email != $confirm_email) {
		$isOk = false;
		#echo "<Br>2 mail diff";
	} elseif (!test_login_mail($login, $email, $db_connect)) {
		$isOk = false;
		#echo "<Br>mail or login already exist in db";
	}

	if($isOk) {
		insert_db($login, $nom, $prenom, $password, $email, $db_connect);
		#echo '<Br>insert succesful';
		header('Location: succes.html');
		exit();
	} else {
		#echo '<Br>insert failed';
		header('Location: fail.html');
		exit();
	};

	#TEST POUR VOIR COMMENT CA MARCHE CE BORDEL
	#$test = "*";
	#$requete = "SELECT ".$test." FROM users WHERE user_login=\"root\"";
	#$res = mysqli_query($db_connect, $requete);
	#echo mysqli_num_rows($res);
	#$data = mysqli_fetch_array($res);
	#echo $data[1];
	#mysqli_free_result($res);