<?php ob_start() ?>

<h1>Our Best Rooms</h1>
<div class="resto">
    <?php foreach ($item as $items) : ?>
        <form action="/showRestaurant/<?= $_SESSION["idUser"] ?>" method="post">
            <input type="hidden" class="id_resto" name="id_resto" value="<?= $items["id_restaurant"] ?>">
            <input type="hidden" class="name_resto" name="name_resto" value="<?= $items["name_restaurant"] ?>">
            <p class="title"><?= $items["name_restaurant"] ?></p>
            <input type="submit" value="Sélectionner ce resto">
        </form>
    <?php endforeach ?>
</div>
<script>
    const encryptStorage = new EncryptStorage("storageType");
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", (event) => {
            encryptStorage.setItem("id_resto", e.parentElement.querySelector(".id_resto").value);
            encryptStorage.setItem("name_resto", e.parentElement.querySelector(".name_resto").value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>