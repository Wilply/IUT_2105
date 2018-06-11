<?php 
	#session_start();
	if (!isset($_SESSION['login'])) {
		header("Location: ./");
	};

	$db_connect = mysqli_connect("localhost", "u_clecoq001", "YwYL3tnj", "db_clecoq001");

	$req_isAdmin = 'SELECT user_is_admin FROM users WHERE user_login="'.$_SESSION['login'].'"';

	$userisAdmin = mysqli_fetch_array(mysqli_query($db_connect, $req_isAdmin))[0];

	if ($userisAdmin == 0) {
		header('Location: ./user_panel.php');
	};

	$req_prod = 'SELECT product_id, product_name FROM products';

	$req_sub_cat = 'SELECT subcat_id, subcat_name FROM sub_categories';

	$res_prod = mysqli_query($db_connect, $req_prod);

	$res_sub_cat = mysqli_query($db_connect, $req_sub_cat);
?>

<div class="gerer_prod_main">
	<form method="POST" action="link_prod_cat.php">
		Ajouter le produit 
		<select required name="id_produit">
			<option disabled selected value>-- PRODUIT -- </option>
			<?php
			while ($row_prod = mysqli_fetch_array($res_prod)) {
			      echo '<option value="'.$row_prod[0].'">'.$row_prod[1].'</option>';
			  }  
			?>
		</select>
		 à la sous catégorie 
		<select required name="id_sub_cat">
			<option disabled selected value>-- CATEGORIES -- </option>
			<?php
			while ($row_sub_cat = mysqli_fetch_array($res_sub_cat)) {
			      echo '<option value="'.$row_sub_cat[0].'">'.$row_sub_cat[1].'</option>';
			  }  
			?>
		</select>
		<Br><input type="submit" name="valider" value="valider">
	</form>
</div>