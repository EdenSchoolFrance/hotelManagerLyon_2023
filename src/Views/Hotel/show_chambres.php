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
            <form action="/chambres/reserver/" method="post">
                <div class="date">
                    <p><input type="date" name="deb_date" id="deb-date"></p>
                    <p><input type="date" name="fin_date" id="fin_date"></p>
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
