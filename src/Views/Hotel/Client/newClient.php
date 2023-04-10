<?php
ob_start();
?>
<form class="client" action="/allclients" method="POST">
  <div>
    <label for="nom">Nom client</label>
    <input type="text" name="nom" id="nom" placeholder="John">
  </div>

  <div>
    <label for="prenom">Prénom client</label>
    <input type="text" name="prenom" id="prenom" placeholder="Doe">
  </div>

  <div>
    <label for="email">Email client</label>
    <input type="email" name="email" id="email" placeholder="johndoe@email.com">
  </div>


  <button type="submit" class="cta">Ajouter le client</button>
</form>


<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
