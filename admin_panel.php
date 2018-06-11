<?php session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	$req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

	$userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

	if ($userisAdmin == 0) {
		header('Location: ./user_panel.php');
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
			<?php include 'admin_panel_menu.php' ?>
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
					case 4:
						include 'add_cat.php';
						break;
					case 5:
						include 'gerer_prod.php';
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
