<?php
ob_start();
?>


<section class="show_salles">


    <?php foreach ($restaurants as $restaurant) { ?>
        <div class="card">
            <h3><?= $restaurant->getname_restaurant(); ?></h3>
            <!-- <div class="image"><img src="/assets/<?php // $restaurant->getimage_restaurant(); 
                                                        ?>" alt="Image de la restaurant"></div> -->
            <a href="<?= $restaurant->getid_restaurant(); ?>" class="valider">Voir les menus du restaurant</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
