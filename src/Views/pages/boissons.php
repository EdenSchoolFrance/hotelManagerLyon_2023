<?php ob_start() ?>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/showBoisson/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_boisson" name="id_boisson" value="<?= $items->getid_boisson() ?>">
            <input type="hidden" class="name_boisson" name="name_boisson" value="<?= $items->getname_boisson() ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_boisson() ?>" alt="">
            </div>
            <p class="price"><?= $items->getprix_un_boisson() ?> €</p>
            <h2><?= $items->getname_boisson() ?></h2>
            <p><?= $items->getdescription_boisson() ?></p>
            <label for="quantity">Quantité de boissons</label>
            <input type="text" id="quantity" name="quantity_boisson" class="quantity_boisson">
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>
<script>
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            encryptStorage.setItem("id_boisson", e.parentElement.querySelector(".id_boisson").value);
            encryptStorage.setItem("name_boisson", e.parentElement.querySelector(".name_boisson").value);
            encryptStorage.setItem("quantity_boisson", e.parentElement.querySelector(".quantity_boisson").value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>