<?php ob_start() ?>
<?php foreach ($item as $items) : ?>
    <form action="/showRestaurant/<?= $_SESSION["idUser"] ?>" method="post">
        <input type="hidden" name="id_resto" value="<?= $items->getName_restaurant() ?>">
        <input type="submit" value="Sélectionner ce resto">
    </form>
<?php endforeach ?>
<script>
    const input = document.querySelectorAll("input[type=submit]");
    input.forEach(e => {
        e.addEventListener("click", () => {
            localStorage.setItem("id_resto", e.previousElementSibling.value);
        })
    })
</script>
<?php
$content = ob_get_clean();
require VIEWS . "layout.php";
?>