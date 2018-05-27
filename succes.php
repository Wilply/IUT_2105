<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>SUCCES</title>
</head>
<body>
	<h1>INSERT DANS LA DB SUCCES OU LOGIN REUSSI</h1>
	<?php echo $_SESSION['login'];
	?>
</body>
</html>