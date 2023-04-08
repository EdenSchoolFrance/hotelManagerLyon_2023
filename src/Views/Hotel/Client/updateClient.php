<?php
ob_start(); 

  foreach($client as $val){ ?>
    <form action="/update/<?= $val->getIdClient() ?>" method="POST">
  <label for="nom">Nom client</label>
  <input type="text" name="nom" id="nom" placeholder="<?= $val->getNomClient() ?>">

  <label for="prenom">Prénom client</label>
  <input type="text" name="prenom" id="prenom" placeholder="<?= $val->getPrenomClient() ?>">

  <label for="email">Email client</label>
  <input type="email" name="email" id="email" placeholder="<?= $val->getEmailClient() ?>">

  <input type="submit"> 
</form>
  
<?php }
?>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
