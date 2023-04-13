<?php ob_start() ?>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/addMenu/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_menu" name="id_menu" value="<?= $items->getid_menu() ?>">
            <input type="hidden" class="name_menu" name="name_menu" value="<?= $items->getname_menu() ?>">
            <input type="hidden" name="client_id" value="<?= $_POST["id_client"] ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_menu() ?>" alt="">
            </div>
            <p class="price"><?= $items->getprix_menu() ?> €</p>
            <div>
                <label for="quantity">quantitées de menu</label>
                <input type="number" name="quantity_menu" id="quantity">
            </div>
            <div>
                <label for="date">date</label>
                <input type="date" name="debut_menu" id="date">
            </div>
            <h2><?= $items->getname_menu() ?></h2>
            <p><?= $items->getdescription_menu() ?></p>
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>
<?php $content = ob_get_clean();
require VIEWS . "layout.php";
?>