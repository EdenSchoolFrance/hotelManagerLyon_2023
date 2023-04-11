<?php
ob_start();
?>
<ul class="breadcrumb">
    <?php foreach ($this->breadcrumbs as $breadcrumb) : ?>
        <li><a href="<?= $breadcrumb["url"] ?>"><?= $breadcrumb["title"] ?></a></li>
        <li>/</li>
    <?php endforeach ?>
</ul>
<?php
$ariane = ob_get_clean();
