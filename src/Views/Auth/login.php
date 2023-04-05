<?php
ob_start();
?>

<section id="login">
<h1>S'identifier</h1>
<form action="/login/" method="post">
    <div>
        <label for="mail"><i class="fas fa-user-tie"></i>Email :</label>
        <input type="mail" id="mail" name='mail'aria-describedby="emailHelp" autocomplete="on" value="<?php echo old("mail");?>">
        <span class="error"><?php echo error("mail");?></span>
    </div>
    <div>
        <label for="password"><i class="fas fa-key"></i>Mot de passe :</label>
        <input type="password" name='password' id="password" autocomplete="on" value="<?php echo old("password");?>">
        <span class="error"><?php echo error("password");?></span>
    </div>
    <button type="submit" class="button" id="connexion">Connexion</button>
    <span class="error"><?php echo error("message");?></span>
  <p>Vous n'avez pas de compte ? <a href="/register">Inscrivez-vous !</a></p>
<script src="js/login.js"></script>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
