<?php
$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

$req_last_id = "SELECT commande_id FROM commandes ORDER BY commande_id DESC";

$last_id = mysqli_fetch_array(mysqli_query($db_connect, $req_last_id))[0];

?>