<?php
ob_start();
?>

<section class="client">
    <h1>information sur les client</h1>

    <div class="flex">
        <a href="../client/create"><h3>Creer</h3></a>
        <a href="../client/liste"><h3>Liste</h3></a>
        <a href="../client/update"><h3>Mettre à jour</h3></a>
        <a href="../client/delete"><h3>Supprimer</h3></a>
    </div>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
