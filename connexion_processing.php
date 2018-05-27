<?php
	
    session_start();

	function secure_input($string, $db) {
		$string = mysqli_real_escape_string($db, $string);
        $string = addcslashes($string, '%_');
        return $string;
    }

	$isOk = true;
	$error_code = 0;
	#ERROR CODE LIST:
	#0 : NO ERROR
	#1 : LE LOGIN N EXISTE PAS DANS LA DB (ou il existe en 2 exemplaire mais wtf)
	#2 : LE MDP NE CORRESPOND PAS

	$db_connect = mysqli_connect("localhost", "toto", "totopwd", "db_clecoq001");
	if (!$db_connect) {
		#echo "Connot connect to mysql server";
		$isOk =  false;
	};

    $login = secure_input($_POST['input_login'], $db_connect);
    $password = secure_input($_POST['input_password'], $db_connect);


    $req_login = "SELECT user_login FROM users WHERE user_login=\"".$login."\"";
    $req_password = "SELECT user_password FROM users WHERE user_login=\"".$login."\"";


    $req_isAdmin = "SELECT user_is_admin FROM users WHERE user_login=\"".$login."\"";
    $req_nom = "SELECT user_name FROM users WHERE user_login=\"".$login."\"";
    $req_prenom = "SELECT user_surname FROM users WHERE user_login=\"".$login."\"";

    $row_login = mysqli_num_rows(mysqli_query($db_connect, $req_login));
    $db_password = mysqli_fetch_array(mysqli_query($db_connect, $req_password))[0];

    $nom = mysqli_fetch_array(mysqli_query($db_connect, $req_nom))[0];
    $prenom = mysqli_fetch_array(mysqli_query($db_connect, $req_prenom))[0];



    if ($row_login != 1) {
    	$isOk = false;
    	$error_code = 1;
    } elseif (!password_verify($password, $db_password)) {
    	$isOk = false;
    	$error_code = 2;
    }

    if ($isOk) {
        $_SESSION['login'] = $login;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
    	header("Location: index.php");
    	#echo 'OK';
    } else {
    	header("Location: connexion.php?error_code=".$error_code);
    	#echo 'PAS OK';
    }

