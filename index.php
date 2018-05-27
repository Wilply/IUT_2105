<?php session_start(); ?>
<!DOCTYPE >
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet_index.css">
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
			<?php
				if(!isset($_SESSION['login'])) { ?>
					<form class="connexion" method="post" action="connexion.php"><input type="submit" value="connexion"></form>
					<form id="inscription_button" class="connexion" method="post" action="inscription.php"><input type="submit" value="inscription"></form>
				<?php } else { ?>
					<div class="connected">
						 <p class="connected_text"> 
						 	Bienvenue <Br>
						 	<?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>
						 </p>
						 <div class="menu_content">
						 	<a href="">Gestion du compte</a>
						 	<a href="disconnect.php">Se deconnecter</a>
						 </div>
					</div>
				<?php }; ?>
		</div>
		<div class="corp">
			<div class="menu">
				
			</div>
			<div class="article">
				
			</div>
		</div>
		<div class="footer">
			
		</div>
	</div>
</body>
</html>