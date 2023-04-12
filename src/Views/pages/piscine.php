<?php ob_start() ?>

<h1>Our Best Piscine</h1>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/showPiscine/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_piscine" name="id_piscine" value="<?= $items->getid_piscine() ?>">
            <input type="hidden" class="name_piscine" name="name_piscine" value="<?= $items->getname_piscine() ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_piscine() ?>" alt="">
            </div>
            <h2><?= $items->getname_piscine() ?></h2>
            <p><?= $items->getdescription_piscine() ?></p>
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>
<script>
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            encryptStorage.setItem("id_piscine", e.parentElement.querySelector(".id_piscine").value);
            encryptStorage.setItem("name_piscine", e.parentElement.querySelector(".name_piscine").value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>