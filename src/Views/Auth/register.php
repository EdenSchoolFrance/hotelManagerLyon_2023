<?php
ob_start();
?>
<p>test</p>
<form action="/register/" method="POST">
  <label for="username">Nom d'utilisateur</label>
  <input type="text" name="username" id="username" placeholder="username">

  <label for="email">Adresse email</label>
  <input type="email" name="email" id="email" placeholder="Adresse email">

  <label for="password">Mot de passe</label>
  <input type="password" name="password" id="password" placeholder="password">
  <input type="submit"> 
</form>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
