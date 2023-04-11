<?php ob_start() ?>
<h1>Our Best Rooms</h1>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/showChambre/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_chambre" name="id_chambre" value="<?= $items->getid_chambre() ?>">
            <input type="hidden" class="name_chambre" name="name_chambre" value="<?= $items->getname_chambre() ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_chambre() ?>" alt="">
            </div>
            <p class="price"><?= $items->getprix_chambre() ?> € / night</p>
            <h2><?= $items->getname_chambre() ?></h2>
            <p><?= $items->getdescription_chambre() ?></p>
            <div class="option">
                <p>option : <?= $items->getoptions_chambre() ?></p>
                <p>categorie : <?= $items->getcategorie_chambre() ?></p>
            </div>
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>
<script>
    const encryptStorage = new EncryptStorage("storageType");
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            encryptStorage.setItem("id_chambre", e.parentElement.querySelector(".id_chambre").value);
            encryptStorage.setItem("name_chambre", e.parentElement.querySelector(".name_chambre").value);
            sessionStorage.setItem("pd", "ddd");
        })
    })
</script>

<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>