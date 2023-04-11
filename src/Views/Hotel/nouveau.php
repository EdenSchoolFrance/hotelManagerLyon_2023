<?php
ob_start();

?>

<section class="dashboard">
    <h1>Ajouter un Nouveau Client</h1>
    <form action="/client/nouveau" method="post" id="form_add_client" class="container">
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Nom">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </div>
        <div>
            <label for="mail">Prénom</label>
            <input type="text" name="mail" id="mail" placeholder="Email">
        </div>
        <div>
            <button type="submit" class="btn_submit">Enregistrer</button>
        </div>
    </form>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
