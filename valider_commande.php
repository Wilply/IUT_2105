<?php  
session_start();

	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	$req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

	$userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

	if ($userisAdmin == 0) {
		header('Location: ./');
	};

	$commande_id = $_POST['commande_id'];
	$action = $_GET['action'];

	#echo $commande_id.'<Br>';;
	#echo $action.'<Br>';

	#UPDATE commandes SET statut = -1 WHERE commande_id = 2;

	$req = 'UPDATE commandes SET statut = '.$action.' WHERE commande_id = '.$commande_id;
	echo $req.'<Br>';

	$res = mysqli_query($db_connect, $req);

	if ($res) {
		header('Location: ./admin_panel.php?page=3');
	} else {
		echo 'FAIL UPDATE DB';
	};
?>