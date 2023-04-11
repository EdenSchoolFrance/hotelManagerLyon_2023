<?php
ob_start();
?>


<section class="show_chambres">


    <?php foreach ($chambres as $chambre) { ?>
        <div class="card">
            <h3><?= $chambre->getdescription_chambre(); ?></h3>
            <div class="option"><?= $chambre->getoptions_chambre(); ?></div>
            <div class="image"><img src="/assets/<?= $chambre->getimage_chambre(); ?>" alt="Image de la chambre"></div>
            <div class="prix"><?= $chambre->getprix_chambre(); ?></div>
            <div class="categorie"><?= $chambre->getcategorie_chambre(); ?></div>
            <a href="reserver/<?= $chambre->getid_chambre(); ?>" class="valider">Reserver la chambre</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
