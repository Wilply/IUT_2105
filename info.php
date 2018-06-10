<?php
	#session_start();

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	if (!isset($_SESSION['login'])) {
		header('Location: ./');
	};

	$user_id = $_SESSION['login'];

	$req_user_info = 'SELECT * FROM users WHERE user_login="'.$user_id.'"';
	$user = mysqli_fetch_array(mysqli_query($db_connect, $req_user_info));

	$user_login = $user[1];
	$user_nom = $user[2];
	$user_prenom = $user[3];
	$user_mail = $user[5];
	$user_isAdmin = $user[6];

	if ($user_isAdmin = 0) {
		$user_isAdmin = 'non';
	} else {
		$user_isAdmin = 'oui';
	};
?>
<div class="panel_info">
	<?php
	echo 'Login : '.$user_login.'<Br>';
	echo 'Nom : '.$user_nom.'<Br>';
	echo 'Prenom : '.$user_prenom.'<Br>';
	echo 'E-mail : '.$user_mail.'<Br>';
	echo 'L\'utilisateur est-il administrateur ? '.$user_isAdmin.'<Br>';
	?>
</div>