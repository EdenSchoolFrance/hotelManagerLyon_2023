<?php
ob_start();
?>


<section class="show">


    <?php foreach ($bars as $bar) { ?>
        <div class="card">
            <h3><?= $bar->getname_bar(); ?></h3>
            <a href="bar/<?= $bar->getid_bar(); ?>" class="valider">Voir les menus du bar</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
