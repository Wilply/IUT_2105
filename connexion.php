<!DOCTYPE html>
<html>

	  <head>
      <meta charset="utf-8">
      <title> Connexion </title>
      <link rel="stylesheet" type="text/css" href="stylesheet_connexion.css">
	  </head>
    <body class="backgroud">
      <div class="login_div">
        <div class="login_head">
          Connexion
        </div>
        <div class="error_div">
          <?php
          if(isset($_GET['error_code'])) {
            if(addcslashes($_GET['error_code'], '%_') == 1) {
              echo "Mauvais nom d'utilisateur";
            } elseif(addcslashes($_GET['error_code'], '%_') == 2) {
              echo "Mauvais mot de passe";
            };
          }
          ?>
        </div>
        <div class="login_input">
          <form method="POST" action="connexion_processing.php">
            Nom d'utilisateur:<br>
            <input type="text" name="input_login" class="login_input_field" placeholder="Nom d'utilisateur" autofocus required><br>
            Mot de passe:<br>
            <input type="Password" name="input_password" class="login_input_field" placeholder="Mot de passe" required ><br>
        </div>
        <div class="login_feet">
            <input type="submit" name="Connexion">
          </form>
        </div>
      </div>
  </body>
</html>
