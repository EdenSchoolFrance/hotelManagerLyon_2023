<?php ob_start() ?>
<?php foreach ($item as $items) : ?>
    <form action="/showPiscine/<?= $_SESSION["idUser"] ?>" method="post">
        <input type="hidden" name="client_id" value="<?= $_SESSION["idUser"] ?>">
        <input type="hidden" class="id_piscine" name="id_piscine" value="<?= $items->getid_piscine() ?>">
        <input type="hidden" class="name_piscine" name="name_piscine" value="<?= $items->getname_piscine() ?>">
        <input type="submit" value="Séléctionner cette piscine">
    </form>
<?php endforeach ?>
<script>
    const encryptStorage = new EncryptStorage("storageType");
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