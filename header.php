<div class="header">
  <a href="../projet/" class="logo" ><img class="image" src="logoUPPA.png"></a>
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
         <div class="connected_text">
          Bienvenue <Br>
          <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>
        </div>
         <div class="menu_content">
          <a href="admin_panel.php">Gestion du compte</a>
          <a href="disconnect.php">Se deconnecter</a>
         </div>
      </div>
    <?php }; ?>
</div>
