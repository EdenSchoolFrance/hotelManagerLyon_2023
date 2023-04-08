<?php
ob_start();
?>
<h1>Liste des clients</h1>
<table class="list">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($clients as $client) { ?>
            <tr>
                <td>
                    <?= $client->getIdClient() ?>
                </td>
                <td>
                    <?= $client->getNomClient() ?>
                </td>
                <td>
                    <?= $client->getPrenomClient() ?>
                </td>
                <td>
                    <?= $client->getEmailClient() ?>
                </td>
                <td>
                    <a href="/update/<?= $client->getIdClient() ?>" class="edit">Éditer</a>
                </td>
                <td>
                    <a href="/delete/<?= $client->getIdClient() ?>" class="del">Supprimer</a>
                </td>
            </tr>
    </tbody>
    <form>
        
    </form>
<?php } ?>

</table>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
