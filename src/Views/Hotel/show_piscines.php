<?php
ob_start();
?>


<section class="show_piscine">


    <?php foreach ($piscines as $piscine) { ?>
        <div class="card">
            <h3><?= $piscine->getname_piscine(); ?></h3>
            <div class="description"><?= $piscine->getdescription_piscine(); ?></div>
            <div class="image"><img src="/assets/<?= $piscine->getimage_piscine(); ?>" alt="Image de la piscine"></div>
            <div class="ouverture">Ouverture: <?= $piscine->getouverture_piscine(); ?></div>
            <div class="fermeture">Fermeture: <?= $piscine->getfermeture_piscine(); ?></div>
            <a href="reserver/<?= $piscine->getid_piscine(); ?>" class="valider">Reserver la piscine</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
