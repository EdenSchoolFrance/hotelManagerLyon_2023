<?php
ob_start();

?>

<section class="dashboard">
    <h1>Reservation / Achats</h1>
    <div id="list">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Chambre</th>
                    <th scope="col">Date debut</th>
                    <th scope="col">Date fin</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $list) {
                ?>
                    <tr>
                        <td><?= $list->getNameChambre() ?></td>
                        <td><?= $list->getDateDebut() ?></td>
                        <td><?= $list->getDateFin() ?></td>
                        <td><a href="/reservation/supprimer/chambre/<?= $list->getIdChambre() ?>"><i class="bi bi-trash-fill red"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
