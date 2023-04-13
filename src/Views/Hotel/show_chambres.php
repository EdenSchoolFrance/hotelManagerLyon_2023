<?php
ob_start();
?>

<section class="show">

    <?php foreach ($chambres as $chambre) { ?>
        <div class="card">
            <h3><a href=""><?= $chambre->getdescription_chambre(); ?></a></h3>
            <p class="option"><?= $chambre->getoptions_chambre(); ?></p>
            <img src="/assets/<?= $chambre->getimage_chambre(); ?>" alt="Image de la chambre">
            <p class="prix"><?= $chambre->getprix_chambre(); ?> €</p>
            <p class="categorie"><?= $chambre->getcategorie_chambre(); ?></p>
            <form action="/chambres/reserver/" method="post">
                <div class="date">
                    <p><input type="date" name="deb_date" class="deb_date" required></p>
                    <p><input type="date" name="fin_date" class="fin_date" required></p>
                </div>

                <input type="hidden" name="id_chambre" value="<?= $chambre->getid_chambre(); ?>">
                <button type="submit" class="valider">Reserver la chambre</button>
            </form>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
