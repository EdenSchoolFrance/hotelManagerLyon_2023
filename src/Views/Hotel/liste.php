<?php
ob_start();

?>

<section class="dashboard">
    <h1>Liste des clients</h1>
    <div id="list">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liste as $list) {
                ?>
                    <tr>
                        <td><?= $list->getNomClient() ?></td>
                        <td><?= $list->getPrenomClient() ?></td>
                        <td><?= $list->getMailClient() ?></td>
                        <td><a href="/client/delete/<?= $list->getIdClient() ?>"><i class="bi bi-trash-fill red"></i></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
