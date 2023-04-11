<?php
ob_start();
?>


<section class="show_salles">


    <?php foreach ($salles as $salle) { ?>
        <div class="card">
            <h3><?= $salle->getname_salle(); ?></h3>
            <div class="description"><?= $salle->getdescription_salle(); ?></div>
            <div class="image"><img src="/assets/<?= $salle->getimage_salle(); ?>" alt="Image de la salle"></div>
            <div class="type"><?= $salle->gettype_salle(); ?></div>
            <div class="option"><?= $salle->getoptions_salle(); ?></div>
            <a href="reserver/<?= $salle->getid_salle(); ?>" class="valider">Reserver la salle</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
