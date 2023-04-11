<?php
ob_start();

?>

<section class="dashboard">
    <h1>Stock Bar (Boissons)</h1>
    <div id="list">
        <table class="table" id="stocktable">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">#</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Bar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stock as $list) {
                ?>
                    <tr>
                        <td><?= $list->getNomBoisson() ?></td>
                        <td><?= $list->getDescriptionBoisson() ?></td>
                        <td class="wrapperimg"><img src="/assets/boissons/<?= $list->getImageBoisson() ?>" alt="<?= $list->getNomBoisson() ?>"></td>
                        <td><?= $list->getPrixBoisson() ?>€</td>
                        <td><?= $list->getQuantiteBoisson() ?></td>
                        <td><?= $list->getNomBar() ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
