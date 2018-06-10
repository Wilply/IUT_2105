<?php session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	$req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

	$userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

	if ($userisAdmin == 0) {
		header('Location: ./');
	};
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
					<a href="./admin_panel.php?page=3"><p class="prim_text">COMMANDES</p></a>
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
					case 3:
						include 'commande_list.php';
						break;
					case 'value':

						break;

					default:
						include 'infophp.php';
						break;
				}
			} else {
				include 'info.php';
			};
			 ?>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>
