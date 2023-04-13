<?php
ob_start();
?>


<section class="show">

    <!-- Affichage des restaurants -->
    <?php foreach ($restaurants as $restaurant) { ?>
        <div class="card">
            <h3><?= $restaurant->getname_restaurant(); ?></h3>
            <a href="<?= $restaurant->getid_restaurant(); ?>" class="valider">Voir le menus du restaurant</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
