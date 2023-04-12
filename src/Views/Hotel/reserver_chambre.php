<?php
ob_start();

?>

<section class="dashboard">
    <?php foreach ($chambre as $num) { ?>
        <h1>Réserver la <?= $num->getNameChambre() ?></h1>
    <?php } ?>

    <div class="wrapper_reserver">
        <form action="/chambre/reserver/confirmer/<?= $slug ?>" method="post" id="form_reserver">
            <div>
                <select class="form-select" name="clients">
                    <option selected>Selectionner un client</option>
                    <?php foreach ($clients as $list) {
                    ?>
                        <option value="<?= $list->getIdClient() ?>"><?= $list->getNomClient() . " " . $list->getPrenomClient() . " | " . $list->getMailClient() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="datedebut">Date de début :</label>
                <input type="date" name="datedebut" id="datedebut">
            </div>
            <div>
                <label for="datefin">Date de fin :</label>
                <input type="date" name="datefin" id="datefin">
            </div>
            <div>
                <button type="submit" class="btn_submit">Confirmer</button>
            </div>
        </form>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
