<?php
	/*if (!isset($_GET['article_id'])) {
		header("Location: index.php");
	};*/

	$id_article = $_GET['article_id'];
	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");
	$sql_query = "SELECT * FROM products WHERE product_id = ".$id_article;
	$result = mysqli_fetch_array(mysqli_query($db_connect, $sql_query));
	
	$nom = $result[1];
	$prix = $result[2];
	$short_descri = $result[3];
	$description = $result[4];
	$image = $result[5];

	/*echo $nom."<Br>";
	echo $prix."<Br>";
	echo $description."<Br>";
	echo $image."<Br>";*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_stylesheet.css">
</head>
<body>
	<div class="main">
		<?php include 'header.php'; ?>
			<div class="corps">
				<?php include 'menu.php'; ?>
			<div class="article_main">
				<div class="article_top_tab">
					<div class="article_page_img">
						<img class="article_image" <?php echo 'src="'.$image.'"'; ?> >
					</div>
					<div class="article_short_descri">
						<p class="article_name"><?php 
						echo $nom;
						?></p>
						<p class="article_short"><?php 
						echo $short_descri;
						?></p>
					</div>
					<div class="article_price_panier">

					</div>
				</div>
				<div class="article_bottom_tab">
					<h3>Description du Produit</h3>
					<p><?php
						echo $description; 
					?></p>
				</div>
			</div>
			<div class="footer">

			</div>
		</div>
	</div>
</body>
</html>