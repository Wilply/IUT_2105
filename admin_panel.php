<?php session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	#AJOUTER UN TRUC POUR EMPECHER UN NON ADMIN D4ACCEDER A CETTE PAGE
?>
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
			<div class="menu">
				<div id="first_prim" class="prim_cat">
					<a href="./admin_panel.php?page=2"><p class="prim_text">INFO</p></a>
				</div>
				<div class="prim_cat">
					<a href="./admin_panel.php?page=#"><p class="prim_text">COMMANDES</p></a>
				</div>
				<div class="prim_cat">
					<p class="prim_text">PRODUITS</p>
					<div class="sub_cat">
						<a href="./admin_panel.php?page=#">GERER</a>
						<a href="./admin_panel.php?page=1">AJOUTER</a>
						<!--<a href="./admin_panel.php?page=#">SUPPRIMER</a>-->
					</div>
				</div>
				<div class="prim_cat">
					<p class="prim_text">CATEGORIES</p>
					<div class="sub_cat">
						<a href="./admin_panel.php?page=#">AJOUTER</a>
						<!--<a href="./admin_panel.php?page=#">SUPPRIMER</a>-->
					</div>
				</div>
				<!--<div class="prim_cat">
					<p class="prim_text">USERS</p>
					<div class="sub_cat">
						<a href="./admin_panel.php?page=#">AJOUTER</a>
						<a href="./admin_panel.php?page=#">SUPPRMIER</a>
					</div>
				</div>-->
			</div>
			<?php
			if (isset($_GET['page'])) {
				switch ($_GET['page']) {
					case 1:
						include 'produit_add.html';
						break;
					case 2:
						include 'info.php';
						break;
					case 'value':

						break;

					default:
						include 'infophp.php';
						break;
				}
			} else {
				include 'infophp.php';
			};
			 ?>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>
