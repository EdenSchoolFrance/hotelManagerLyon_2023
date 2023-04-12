<?php
ob_start();
?>


<section class="show_piscine">


    <?php foreach ($piscines as $piscine) { ?>
        <div class="card">
            <h3><?= $piscine->getname_piscine(); ?></h3>
            <div class="description"><?= $piscine->getdescription_piscine(); ?></div>
            <div class="image"><img src="/assets/<?= $piscine->getimage_piscine(); ?>" alt="Image de la piscine"></div>
            <div class="ouverture">Ouverture: <?= $piscine->getouverture_piscine(); ?></div>
            <div class="fermeture">Fermeture: <?= $piscine->getfermeture_piscine(); ?></div>
            <form action="/piscines/reserver/" method="post">
                <div class="date">
                    <p><input type="date" name="deb_date" id="deb-date"></p>
                    <p><input type="date" name="fin_date" id="fin_date"></p>
                </div>

                <input type="hidden" name="id_piscine" value="<?= $piscine->getid_piscine(); ?>">
                <button type="submit" class="valider">Reserver la piscine</button>
            </form>

        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
