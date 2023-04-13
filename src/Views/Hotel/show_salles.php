<?php
ob_start();
?>


<section class="show">


    <?php foreach ($salles as $salle) { ?>
        <div class="card">
            <h3><?= $salle->getname_salle(); ?></h3>
            <div class="description"><?= $salle->getdescription_salle(); ?></div>
            <div class="image"><img src="/assets/<?= $salle->getimage_salle(); ?>" alt="Image de la salle"></div>
            <div class="type"><?= $salle->gettype_salle(); ?></div>
            <div class="option"><?= $salle->getoptions_salle(); ?></div>
            <form action="/salles/reserver/" method="post">
                <div class="date">
                    <p><input type="date" name="deb_date" class="deb_date" required></p>
                    <p><input type="date" name="fin_date" class="fin_date" required></p>
                </div>

                <input type="hidden" name="id_salle" value="<?= $salle->getid_salle(); ?>">
                <button type="submit" class="valider">Reserver la piscine</button>
            </form>
        </div>
    <?php } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
