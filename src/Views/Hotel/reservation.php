<?php
ob_start();
?>
<section class="chambres container">
    <h1>Liste des chambres disponibles</h1>
    <?php
    foreach ($chambres as $chambre) { ?>
        <article>
            <h2><?= $chambre->getNameChambre() ?></h2>
            <img src="/img/chambres/<?= $chambre->getImageChambre() ?>">
            <p><?= $chambre->getDescriptionChambre() ?></p>
            <a href="reservation/ch<?=$chambre->getIdChambre() ?>" class="cta">Réserver</a>
        </article>
    <?php } ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>