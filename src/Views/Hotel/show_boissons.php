<?php
ob_start();
?>

<!-- Retour sur la page des bars -->
<a href="/bars/" class="Back">Revenir aux bars</a>
<!-- Affichage des boissons -->
<section class="show">
    <?php foreach ($boissons as $boisson) { ?>
        <!-- Ici mettre le titre des restaurants (pour rappel) -->
        <?php //echo "<h1>" . $menu->getname_menu()[1] . "</h1>"; 
        ?>
        <div class="card">
            <h3><?= $boisson->getname_boisson(); ?></h3>
            <p class="description"><?= $boisson->getdescription_boisson(); ?></p>
            <p class="image"><img src="/assets/<?= $boisson->getimage_boisson(); ?>" alt="Image de la boisson"></p>
            <p class="prix"><?= $boisson->getprix_un_boisson(); ?> €</p>
            <form action="/boisson/reserver/" method="post">
                <input type="number" name="quantite" class="quantite" required>
                <input type="hidden" name="id_boisson" value="<?= $boisson->getid_boisson(); ?>">
                <button type="submit" class="valider">Reserver des boissons</button>
            </form>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
