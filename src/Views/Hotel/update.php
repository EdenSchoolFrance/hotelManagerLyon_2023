<?php
ob_start();
?>
<h1>Modifier un client</h1>
<form action="/update" method="POST">
    <input type="hidden" name="id" value="<?= $client->getId() ?>">
    <div>
        <label for="prenom"><i class="fas fa-user-tie"></i>Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $client->getPrenom() ?>">
    </div>
    <div>
        <label for="nom"><i class="fas fa-user-tie"></i>Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $client->getNom() ?>">
    </div>
    <div>
        <label for="mail"><i class="fas fa-user-tie"></i>Email :</label>
        <input type="mail" id="mail" name="mail" value="<?= $client->getEmail() ?>">
    </div>
    <input type="submit">
</form>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';