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

	$id_prod = $_POST['id_produit'];

	$id_sub_cat = $_POST['id_sub_cat'];

	/*echo $id_prod;
	echo $id_sub_cat;*/

	$req = 'UPDATE products SET product_sub_cat = '.$id_sub_cat.' WHERE product_id = '.$id_prod;
	#echo $req;

	$res = mysqli_query($db_connect, $req);

	if ($res) {
		header('Location: admin_panel.php?page=5');
	}
?>