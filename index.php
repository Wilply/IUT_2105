<?php session_start(); ?>
<!DOCTYPE >
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_stylesheet.css">
	<title>PAGE PRICIPALE</title>
</head>
<body class="background">
	<div class="main">
		<?php include 'header.php'; ?>
		<div class="corps">
			<?php include 'menu.php'; ?>
		<div class="article_list">
			<?php include 'article_processing.php'; ?>
		</div>
			<?php include 'panier.php'; ?>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>
