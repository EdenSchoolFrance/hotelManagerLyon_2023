<?php ob_start() ?>

<?php foreach ($item['boissons'] as $boisson) : ?>
    <p><?= $boisson->getname_boisson() ?></p>
<?php endforeach ?>


<?php foreach ($item['chambres'] as $chambre) : ?>
    <p><?= $chambre->getname_chambre() ?></p>
<?php endforeach ?>


<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>