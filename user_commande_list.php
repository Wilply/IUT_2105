<?php
	#session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	$req_last_id = "SELECT commande_id FROM commandes ORDER BY commande_id DESC";
	$last_id = mysqli_fetch_array(mysqli_query($db_connect, $req_last_id))[0];

	#select commande_id, sum(quantite*product_price), comment, statut from commandes, products where commandes.product_id = products.product_id and commande_id=4;

	function wait_or_valid($bool) {
		if ($bool == 0) {
			$res = 'En attente';
		} elseif ($bool == 1) {
			$res = 'Validé';	
		} elseif ($bool == -1) {
			$res = 'Annulé';
		};
		return $res;
	}


?>
<table class="commande_list_table">
	<tr id="commande_list_row_one">
		<td>#ID</td>
		<td>COMMENT</td>
		<td>PRIX</td>
		<td>STATUS</td>
	</tr>
<?php

	for ($i = 1; $i <= $last_id; $i++) {
		$req_commande = 'SELECT commande_id, comment, sum(quantite*product_price), statut FROM commandes, products WHERE commandes.product_id = products.product_id AND commande_id='.$i.' AND client=2';#.$_SESSION['login'];
		#echo $req_commande;
		$res_commande = mysqli_fetch_array(mysqli_query($db_connect, $req_commande));
		
		if ($res_commande[0]) {
			echo '<tr class="commande_list_row" onclick="window.location=\'user_commande_detail.php?commande_id='.$i.'\';">';
			echo '<td id="commande_list_id">'.$res_commande[0].'</td>';
			echo '<td id="commande_list_comment">'.$res_commande[1].'</td>';
			echo '<td id="commande_list_price">'.$res_commande[2].' € </td>';
			echo '<td id="commande_list_status">'.wait_or_valid($res_commande[3]).'</td>';
			echo '</tr>';
		}
	}

?>

</table>