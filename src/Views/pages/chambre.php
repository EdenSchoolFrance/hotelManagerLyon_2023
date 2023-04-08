<?php ob_start() ?>
<?php foreach ($item as $items) : ?>
    <form action="/showChambre/<?= $_SESSION["idUser"] ?>" method="post">
        <input type="hidden" name="client_id" value="<?= $_SESSION["idUser"] ?>">
        <input type="hidden" name="id_chambre" value="<?= $items->getname_chambre() ?>">
        <input type="submit" value="Séléctionner cette chambre">
    </form>
<?php endforeach ?>
<script>
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            localStorage.setItem("id_chambre", e.previousElementSibling.value)
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>