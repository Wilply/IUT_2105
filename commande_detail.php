<?php
	#session_start();
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

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>