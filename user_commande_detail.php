<?php
	session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	if (!isset($_GET['commande_id'])) {
		#echo 'pas de commande_id passe en get<Br>';
		header('Location: ./');
	} else {
		$commande_id = $_GET['commande_id'];
	};

#SELECT quantite, product_name, quantite*product_price FROM commandes, products WHERE commandes.product_id=products.product_id AND commande_id=1;
	$req = 'SELECT quantite, product_name, quantite*product_price FROM commandes, products WHERE commandes.product_id=products.product_id AND commande_id='.$commande_id;

	$row = mysqli_query($db_connect, $req);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_stylesheet.css">
	<title>M2105</title>
</head>
<body>
	<div class="main">
		<?php include 'header.php'; ?>
		<div class="commande_detail_main">
		<?php include 'user_panel_menu.php'; ?>
			<div class="commande_detail_list">
				<?php 
				$total = 0;
				for ($i = 0; $i < mysqli_num_rows($row); $i++) {
					$res = mysqli_fetch_array($row);
					echo '<div class="commande_detail_one">';
						echo '<span class="commande_detail_left">';
				 		echo $res[0].' * '.$res[1].'</span>';
				 		echo '<span class="commande_detail_right"> = '.$res[2]."€ <Br>";
				 		echo '</span>';
				 		$total = $total + $res[2];
				 	echo '</div>';
				 }

				 echo '<hr id="commande_separator" class="article_detail_separator" >';

				 echo '<div class="commande_detail_one">';
				 echo '<span class="commande_detail_left">';
				 echo 'TOTAL </span>';
				 echo '<span id="commande_detail_last" class="commande_detail_right">';
				 echo ' = '.$total.' € </span>';
				 echo '</span>';
				 echo '</div>';

				 ?>
			</div>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>