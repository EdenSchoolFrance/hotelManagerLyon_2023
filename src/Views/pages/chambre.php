<?php ob_start() ?>
<?php foreach ($item as $items) : ?>
    <form action="/showChambre/<?= $_SESSION["idUser"] ?>" method="post">
        <input type="hidden" class="id_chambre" name="id_chambre" value="<?= $items->getid_chambre() ?>">
        <input type="hidden" class="name_chambre" name="name_chambre" value="<?= $items->getname_chambre() ?>">
        <input type="submit" value="Séléctionner cette chambre">
    </form>
<?php endforeach ?>
<script>
    const encryptStorage = new EncryptStorage("storageType");
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            encryptStorage.setItem("id_chambre", e.parentElement.querySelector(".id_chambre").value);
            encryptStorage.setItem("name_chambre", e.parentElement.querySelector(".name_chambre").value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>