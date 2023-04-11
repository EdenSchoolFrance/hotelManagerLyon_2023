<?php ob_start() ?>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/showMenu/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_menu" name="id_menu" value="<?= $items->getid_menu() ?>">
            <input type="hidden" class="name_menu" name="name_menu" value="<?= $items->getname_menu() ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_menu() ?>" alt="">
            </div>
            <p class="price"><?= $items->getprix_menu() ?> € / night</p>
            <h2><?= $items->getname_menu() ?></h2>
            <p><?= $items->getdescription_menu() ?></p>
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>
<?php $content = ob_get_clean();
require VIEWS . "layout.php";
?>