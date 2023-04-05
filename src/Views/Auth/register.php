<?php
ob_start();
?>

<section id="login">
<h1>Création de compte</h1>
<form action="/register/" method="post">
    <div>
        <label for="mail"><i class="fas fa-user-tie"></i>Email :</label>
        <input type="mail" name="mail" id="mail" aria-describedby="emailHelp" autocomplete="on" require value="<?php echo old("mail");?>">
        <span class="error"><?php echo error("mail");?></span>
    </div>
    <div>
        <label for="name"><i class="fas fa-user-tie"></i>Pseudo :</label>
        <input type="text" name="name" id="name" autocomplete="on" require value="<?php echo old("name");?>">
        <span class="error"><?php echo error("username");?></span>
    </div>
    <div>
        <label for="new-password"><i class="fas fa-key"></i>Mot de passe :</label>
        <input type="password" name="new-password" id="new-password" autocomplete="on" require value="<?php echo old("new-password");?>">
        <span class="error"><?php echo error("new-password");?></span>
    </div>
    <div>
        <label for="repeatPassword"><i class="fas fa-key"></i>Répéter le Mot de passe :</label>
        <input type="password" name="repeatPassword" id="repeatPassword" autocomplete="on" require value="<?php echo old("repeatPassword");?>">
        <span class="error"><?php echo error("repeatPassword");?></span>
    </div>
    <button type="submit" class="button" id="create">Crée votre compte</button>
  <p>Vous avez déjà un compte ? <a href="/login">Connectez-vous !</a></p>
  <script src="js/register.js"></script>
</section>



<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
