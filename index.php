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
		<div class="corp">
			<div class="menu">
				<div id="first_prim" class="prim_cat">
					<p class="prim_text">CATEGORIES</p>
				</div>
				<div class="prim_cat">
					<p class="prim_text">CHAUSETTE</p>
					<div class="sub_cat">
						<a href="">ROUGE</a>
						<a href="">RAYE</a>
						<a href="">EN BOIS</a>
					</div>
				</div>
				<div class="prim_cat">
					<p class="prim_text">POISSON</p>
					<div class="sub_cat">
						<a href="">NEMO</a>
						<a href="">DORIE</a>
						<a href="">POSKAILLE</a>
						<a href="">KRALAMOUR</a>
					</div>
				</div>
				<div class="prim_cat">
					<p class="prim_text">ANIMAUX</p>
					<div class="sub_cat">
						<a href="">IUT G1</a>
						<a href="">IUT G2</a>
						<a href="">GIGABYTE</a>
					</div>
				</div>
			</div>
			<div class="article">
				<?php include 'article_processing.php'; ?>
			</div>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>
