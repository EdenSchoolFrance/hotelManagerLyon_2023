<?php
ob_start(); 
?>
    <form action="/allclients" method="POST">
  <label for="nom">Nom client</label>
  <input type="text" name="nom" id="nom" placeholder="Nom">

  <label for="prenom">Prénom client</label>
  <input type="text" name="prenom" id="prenom" placeholder="Prénom">

  <label for="email">Email client</label>
  <input type="email" name="email" id="email" placeholder="Email">

  <input type="submit"> 
</form>
  

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
