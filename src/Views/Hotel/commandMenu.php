<?php
ob_start();
?>

<section class="commandMenu">
    <h1 style="background: url('../pictures/<?= $menu->getImg() ?>') no-repeat;">Commander <?= $menu->getName() ?></h1>
    <?php
    if (isset($_GET['valid'])) {
        if ($_GET['valid']) {
            echo "<p class='valid-message'>Commande validée !</p>";
        }
    }
    ?>
    <div class="reserveForm">
        <form action="/validCommandMenu" method="post">
            <input type="hidden" value="<?= $menu->getId() ?>" name="idMenu">
            <select name="client" id="client">
                <option value="">-- Choisissez un client --</option>
                <?php foreach ($clients as $client) { ?>
                    <option value="<?= $client->getId() ?>"><?= $client->getMail() ?></option>
                <?php } ?>
            </select>
            <p class="error"><?php echo error("client"); ?></p>
            <div class="input-label">
                <label for="quantity">Sélectionner le nombre de menu commandé :</label>
                <input name="quantity" type="number" min="1" max="99" value="1">
            </div>
            <p class="error"><?php echo error("quantity"); ?></p>
            <button type="submit" class="btn">Commander</button>

        </form>
    </div>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
