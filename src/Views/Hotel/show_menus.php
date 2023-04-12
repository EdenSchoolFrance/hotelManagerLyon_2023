<?php
ob_start();
?>


<section class="show_menus">
    <a href="/restaurants/">Revenir aux restaurants</a>
    <?php foreach ($menus as $menu) { ?>
        <!-- Ici mettre le titre des restaurants (pour rappel) -->
        <?php //echo "<h1>" . $menu->getname_menu()[1] . "</h1>"; 
        ?>
        <div class="card">
            <h3><?= $menu->getname_menu(); ?></h3>
            <div class="description"><?= $menu->getdescription_menu(); ?></div>
            <div class="image"><img src="/assets/<?= $menu->getimage_menu(); ?>" alt="Image de la menu"></div>
            <div class="prix"><?= $menu->getprix_un_menu(); ?></div>
            <a href="reserver/<?= $menu->getid_menu(); ?>" class="valider">Reserver un menu</a>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
