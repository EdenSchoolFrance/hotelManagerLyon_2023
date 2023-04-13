<?php
ob_start();
?>

<!-- Retour sur la page -->
<a href="/restaurants/" class="Back">Revenir aux restaurants</a>
<!-- Affichage des menus -->
<section class="show">
    <?php foreach ($menus as $menu) { ?>
        <!-- Ici mettre le titre des restaurants (pour rappel) -->
        <?php //echo "<h1>" . $menu->getname_menu()[1] . "</h1>"; 
        ?>
        <div class="card">
            <h3><?= $menu->getname_menu(); ?></h3>
            <p class="description"><?= $menu->getdescription_menu(); ?></p>
            <p class="image"><img src="/assets/<?= $menu->getimage_menu(); ?>" alt="Image de la menu"></p>
            <p class="prix"><?= $menu->getprix_un_menu(); ?> €</p>
            <form action="/menu/reserver/" method="post">
                <input type="number" name="quantite" class="quantite" required>
                <input type="hidden" name="id_menu" value="<?= $menu->getid_menu(); ?>">
                <button type="submit" class="valider">Reserver ce menu</button>
            </form>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
