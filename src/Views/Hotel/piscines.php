<?php
ob_start();
?>
<section class="wrap-content">
    <div>
        <h1>Liste des piscines</h1>
        <a href="/" class="cta">Accueil</a>
    </div>
    
    <?php
    foreach ($piscine as $val) { ?>
        <article>
            <img src="/img/piscines/<?= $val->getImagePiscine() ?>" alt="<?= $val->getNamePiscine() ?>">
            <h2><?= $val->getNamePiscine() ?></h2>
            <p><?= $val->getDescriptionPiscine() ?></p>
            <p><?= $val->getOuverturePiscine() ?> - <?= $val->getFermeturePiscine() ?></p>
        </article>
    <?php } ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';