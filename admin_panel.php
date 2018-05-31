<?php session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: /");
	};
?>
<!DOCTYPE >
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="admin_panel.css">
	<title>PAGE PRICIPALE</title>
</head>
<body class="background">
	<div class="main">
		<div class="header">
			<img class="logo" src="logoUPPA.png">
			<form class="search_bar" action="search.php">
				<input type="text" name="search" class="search_input">
				<button type="submit" class="search_button"></button>
			</form>
				<div class="connected">
					 <div class="connected_text">
					 	Bienvenue <Br>
					 	<?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>
					</div>
					 <div class="menu_content">
					 	<a href="">Gestion du compte</a>
					 	<a href="disconnect.php">Se deconnecter</a>
					 </div>
				</div>
			</div>
		<div class="corps">
			<div class="menu">
				<div id="first_prim" class="prim_cat">
					<p class="prim_text">INFO</p>
				</div>
				<div class="prim_cat">
					<p class="prim_text">PRODUITS</p>
					<div class="sub_cat">
						<a href="">GERER</a>
						<a href="">AJOUTER</a>
						<a href="">SUPPRIMER</a>
					</div>
				</div>
				<div class="prim_cat">
					<p class="prim_text">CATEGORIES</p>
					<div class="sub_cat">
						<a href="">AJOUTER</a>
						<a href="">SUPPRIMER</a>
					</div>
				</div>
				<div class="prim_cat">
					<p class="prim_text">USERS</p>
					<div class="sub_cat">
						<a href="">AJOUTER</a>
						<a href="">SUPPRMIER</a>
					</div>
				</div>
			</div>
			<?php include 'info.php'; ?>
		</div>
		<div class="footer">

		</div>
	</div>
</body>
</html>
