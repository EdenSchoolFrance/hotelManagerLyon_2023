<?php ob_start() ?>

<h1>Our Best Salle</h1>
<div class="showReserv">
    <?php foreach ($item as $items) : ?>
        <form action="/showSalle/<?= $_SESSION["idUser"] ?>" method="post">
            <div class="anim">
                <img src="/img/icons/plus.svg" alt="">
            </div>
            <input type="hidden" class="id_salle" name="id_salle" value="<?= $items->getid_salle() ?>">
            <input type="hidden" class="name_salle" name="name_salle" value="<?= $items->getname_salle() ?>">
            <div class="overflow">
                <img src="/img/<?= $items->getimage_salle() ?>" alt="">
            </div>
            <h2><?= $items->getname_salle() ?></h2>
            <p><?= $items->getdescription_salle() ?></p>
            <input type="submit" value="">
        </form>
    <?php endforeach ?>
</div>

<script>
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            encryptStorage.setItem("id_salle", e.parentElement.querySelector(".id_salle").value);
            encryptStorage.setItem("name_salle", e.parentElement.querySelector(".name_salle").value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>