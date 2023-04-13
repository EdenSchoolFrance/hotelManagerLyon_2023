<?php
ob_start();
?>

<!-- Page d'affichage des clients -->
<section class="clients">
    <table>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Ajout d'informations</th>
        </tr>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <td> <?= $client->getprenom_client(); ?></td>
                <td> <?= $client->getnom_client(); ?></td>
                <td> <?= $client->getemail_client(); ?></td>
                <td><a href="/client/<?= $client->getid_client() ?>">Voir plus</a></td>
            </tr>
        <?php } ?>
    </table>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
