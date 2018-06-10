<?php

session_start();

if (!isset($_SESSION['login'])) {
	header('Location: connexion.php');
}

if ($_SESSION['panier'] == array()) {
	header('Location: ./');
}

function secure_input($string, $db) {
	$string = mysqli_real_escape_string($db, $string);
    $string = addcslashes($string, '%_');
    return $string;
}

$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

$req_last_id = "SELECT commande_id FROM commandes ORDER BY commande_id DESC";

$last_id = mysqli_fetch_array(mysqli_query($db_connect, $req_last_id))[0];

if ($last_id == '') {
	$last_id = 0;
};

$last_id = $last_id + 1;

$req_user_id = 'SELECT user_id FROM users WHERE user_login ="'.$_SESSION['login'].'"';

$user_id = mysqli_fetch_array(mysqli_query($db_connect, $req_user_id))[0];

$panier = $_SESSION['panier'];
$comment = 'Commande passé par '.$_SESSION['login'].' le '.getdate()['mday'].'/'.getdate()['mon'].'/'.getdate()['year'];

#echo count($panier, true);

for ($i = 0; $i < count($panier); $i++) {
	$id = $panier[$i][0];
	$quantite = $panier[$i][1];
	$req_add_commande = 'INSERT INTO commandes VALUES("'.$last_id.'","'.$id.'","'.$quantite.'","'.$user_id.'",false,"'.$comment.'")';
	$res = mysqli_query($db_connect, $req_add_commande);
	/*if ($res) {
		echo '<Br>OUI<Br>';
	}*/
	#echo $req_add_commande;
}

if ($res) {
	#echo 'query ok';
	$_SESSION['panier'] = array();
};

header('Location: ./');
?>