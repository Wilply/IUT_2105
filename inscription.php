<!DOCTYPE html>
<html>

	  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1"charset="utf-8">
      <title> Inscription </title>
      <link rel="stylesheet" type="text/css" href="stylesheet.css">
	  </head>
      <body class="backgroud">
        <div class="login_div_inscription">
          <div class="login_head">
            Inscription
          </div>
          <div class="error_div">
            <?php
            if (!isset($_GET['error_code'])) {
              echo '<Br>';
            }
            if(isset($_GET['error_code'])) {
              if(addcslashes($_GET['error_code'], '%_') == 1) {
                echo "Vous avez entré 2 mot de passe differents";
              } elseif(addcslashes($_GET['error_code'], '%_') == 2) {
                echo "Vous avez entré 2 addresses emails differentes";
              } elseif(addcslashes($_GET['error_code'], '%_') == 3) {
                echo "<Br>Ce pseudo est déja utilisée";
              } elseif(addcslashes($_GET['error_code'], '%_') == 4) {
                echo "Cette adresse email est déjà enregistrée";
              } else {
                echo '<Br>';
              }
            }
            ?>
          </div>
          <div class="login_input">
            <form method="post" action="inscription_processing.php">
                Nom:<br>
                <input type="text" name="nom" class="login_input_field" placeholder="Nom d'utilisateur" autofocus required><br>
                Prénom:<br>
                <input type="text" name="prenom" class="login_input_field" placeholder="Nom d'utilisateur" autofocus required><br>
                Nom d'utilisateur:<br>
                <input type="text" name="login" class="login_input_field" placeholder="Nom d'utilisateur" autofocus required><br>
                Mot de passe:<br>
                <input type="Password" name="password" class="login_input_field" placeholder="Mot de passe" required ><br>
                <input type="Password" name="confirm_password" class="login_input_field" placeholder="Retapez le Mot de passe" required ><br>
                Adresse Email:<br>
                <input type="email" name="email" class="login_input_field_mail" placeholder="Email" required ><br>
                <input type="email" name="confirm_email" class="login_input_field_mail" placeholder="Confirmez l'adresse Email" required >
            </div>
          <div class="login_feet">
            <input type="submit" name="sign up">
              </form>
          </div>
        </div>
	  </body>

	</html>
