<?php
ob_start();
?>

<section class="show_client">
    <table>
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Ajout d'informations</th>
        </tr>
        <tr>
            <td><?= $client->getprenom_client(); ?></td>
            <td><?= $client->getnom_client(); ?></td>
            <td><?= $client->getemail_client(); ?></td>
            <td><a href="/client/<?= $client->getid_client() ?>">Voir plus</a></td>
        </tr>
    </table>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
