<?php #session_start(); 
if (!isset($_SESSION['panier'])) {
	header('Location: index.php');
}

if (!isset($_SESSION['panier'])) {
	$_SESSION['panier'] = array();
}

if (!isset($db_connect)) {
	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");
}

$total = 0;

function get_name_price($id, $db) {
	$req_article = "SELECT product_name, product_price FROM products WHERE product_id =".$id;
	#echo $req_article;
	$res = mysqli_fetch_array(mysqli_query($db, $req_article));

	return $res;
}

?>
<div class="article_detail_main">
	<div class="article_detail_list">
		<?php 
		for ($i = 0; $i < count($_SESSION['panier']); $i++) {
			echo '<div class="article_detail_one">';
				echo '<span class="article_detail_name">';
		 		echo$_SESSION['panier'][$i][1].' * ';
		 		$res = get_name_price($_SESSION['panier'][$i][0], $db_connect);
		 		echo $res[0].'</span>';
		 		echo '<span class="article_detail_prix"> = '.$res[1]*$_SESSION['panier'][$i][1]."€ <Br>";
		 		echo '<span>';
		 		$total = $total + $res[1]*$_SESSION['panier'][$i][1];
		 	echo '</div>';
		 }
		 ?>
	</div>
	<div class="article_detail_valider">
		<hr class="article_detail_separator" >
		<div class="article_detail_one" >
			<span class="article_detail_name" >TOTAL : </span>
			<span class="article_detail_prix"><?php echo ' = '.$total.' €' ?></span>
		</div>
		<form class="article_detail_button">
			<span id="article_detail_valider_text">Valider la commande ?</span>
			<input type="submit" value="Valider">
			<input type="submit" value="Abandonner">
		</form>
	</div>
</div>