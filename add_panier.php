<?php
session_start();
	
	if (!$_SESSION['login']) {
		header('Location: connexion.php');
	};

	if (!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = array();
	};

	$quantite = $_POST['quantite'];
	$id_prod = $_POST['product_id'];
	echo $id_prod."<Br>";
	echo $quantite;
	if ($quantite > 0) {
		$add_panier = array($id_prod, $quantite);
		$_SESSION['panier'][] = $add_panier;
	};
	header('Location: '.$_POST['previous_page'])
?>