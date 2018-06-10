<?php
	#session_start();

	if (!isset($_SESSION['panier'])) {
		$_SESSION['panier'] = array();
	}

	if (!isset($db_connect)) {
		$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");
	}
	if (count($_SESSION['panier'], COUNT_RECURSIVE) > 0) {

	$total = 0;

	function get_name_price($id, $db) {
		$req_article = "SELECT product_name, product_price FROM products WHERE product_id =".$id;
		#echo $req_article;
		$res = mysqli_fetch_array(mysqli_query($db, $req_article));

		return $res;
	}
?>

<div class="panier_main">
	<div class="panier_list">
		<?php
		for ($i = 0; $i < count($_SESSION['panier']); $i++) {
		 		echo$_SESSION['panier'][$i][1].' * ';
		 		$res = get_name_price($_SESSION['panier'][$i][0], $db_connect);
		 		echo $res[0]." = ".$res[1]*$_SESSION['panier'][$i][1]."€ <Br>";
		 		$total = $total + $res[1]*$_SESSION['panier'][$i][1];
		 } 
		?>
	</div>
	<div class="panier_total">
		TOTAL : <?php echo $total; ?> €
	</div>
	<div class="panier_valider">
		<form id="valider_form">
		<button type="submit" formaction="valider_panier.php">Valider la commander</button>
	</form>
	</div>
</div>

<?php } ?>