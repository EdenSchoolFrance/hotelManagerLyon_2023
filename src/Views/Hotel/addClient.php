<?php
ob_start();
?>
<section class="card">
<h1>Ajouter un client</h1>
<form action="/add" method="POST">
    <div>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div>
        <label for="mail">Email :</label>
        <input type="mail" id="mail" name="mail">
    </div>
    <!-- <div>
        <label for="password"><i class="fas fa-key"></i>Mot de passe :</label>
        <input type="password" id="password" name="password">
    </div> -->
    <input type="submit" class="button">
</form>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';