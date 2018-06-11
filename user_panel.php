<?php  
	session_start();
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
			<?php include 'user_panel_menu.php' ?>
			<?php
			if (isset($_GET['page'])) {
				switch ($_GET['page']) {
					case 2:
						include 'info.php';
						break;
					case 3:
						include 'user_commande_list.php';
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