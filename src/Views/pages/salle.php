<?php ob_start() ?>
<?php foreach ($item as $items) : ?>
    <form action="/showSalle/<?= $_SESSION["idUser"] ?>" method="post">
        <input type="hidden" class="id_salle" name="id_salle" value="<?= $items->getid_salle() ?>">
        <input type="hidden" class="name_salle" name="name_salle" value="<?= $items->getname_salle() ?>">
        <input type="submit" value="Séléctionner cette salle">
    </form>
<?php endforeach ?>
<script>
    const encryptStorage = new EncryptStorage("storageType");
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