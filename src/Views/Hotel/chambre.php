<?php
ob_start();

?>

<section class="dashboard">
    <h1>Liste des Chambres</h1>
    <div class="wrapper_chambres">
        <?php foreach ($chambres as $list) {
        ?>
            <div class="block">
                <h2><?= $list->getNameChambre() ?></h2>
                <p class="green"><?= $list->getPrixChambre() ?>€</p>
                <img src="/assets/chambres/<?= $list->getImageChambre() ?>" alt="<?= $list->getNameChambre() ?>">
                <p><?= $list->getDescriptionChambre() ?></p>

                <?php if ($list->getOccupeChambre() == 0) { ?>
                    <a href="/chambre/reserver/<?= $list->getIdChambre() ?>" class="disponnible">Sélectionner</a>
                <?php } else { ?>
                    <p class="occupe">Indisponnible</p>
                <?php } ?>

            </div>
        <?php } ?>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
