<?php
ob_start();
?>
<section class="chambres">
    <?php
    foreach ($chambres as $chambre) { ?>
        <article>
            <h2><?= $chambre->getNameChambre() ?></h2>
            <img src="/img/chambres/<?= $chambre->getImageChambre() ?>">
            <p><?= $chambre->getDescriptionChambre() ?></p>
            <a href="#" class="cta">Réserver</a>
        </article>
    <?php } ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>