<?php
ob_start();

?>

<section class="dashboard">
    <h1>Logs Réservations et/ou Achats Clients</h1>

    <div class="wrapper_reserver">
        <form action="/logs/" method="post" id="form_reserver">
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
                <button type="submit" class="btn_submit">Rechercher</button>
            </div>
        </form>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
