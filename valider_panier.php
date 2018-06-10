<?php session_start(); 
if (!isset($_SESSION['login'])) {
	header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>M2105</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="main_stylesheet.css">
</head>
<body>
	<div class="main">
		<?php include 'header.php'; ?>
		<?php include 'panier_detail.php'; ?>
	<div class="footer">

	</div>
	</div>
</body>
</html>