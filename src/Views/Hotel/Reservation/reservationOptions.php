<?php
ob_start();
?>
<section id="chambres">
<?php
foreach ($options as $option) { ?>
  <article>
    <img src="/img/chambres/<?= $option->getImageChambre() ?>" alt="<?= $option->getNameChambre() ?>">
    <h2><?= $option->getNameChambre() ?></h2>
    <p><?= $option->getDescriptionChambre() ?></p>
    <h3><?= $option->getPrixChambre() ?></h3>
   
  </article>

<?php } ?>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
