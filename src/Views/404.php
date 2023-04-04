<?php
ob_start();

?>

<section class="error">
    <h1>Erreur 404</h1>
    <p>La page n'existe pas <a href="/">quitter cette page</a> et revenir sur la page d'accueil</p>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
