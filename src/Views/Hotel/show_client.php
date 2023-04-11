<?php
ob_start();
?>


<section class="show_client">
    <table>
        <tr>
            <th>Id</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Chambres</th>
            <th>Piscines</th>
            <th>Salles</th>
        </tr>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <td><?= $client->getid_client(); ?></td>
                <td><?= $client->getprenom_client(); ?></td>
                <td><?= $client->getnom_client(); ?></td>
                <td><?= $client->getemail_client(); ?></td>
                <td><a href="/chambres/">Reserver une chambre</a></td>
                <td><a href="/piscines/">Reserver une piscine</a></td>
                <td><a href="/salles/">Reserver une salle</a></td>
            </tr>
        <?php } ?>
    </table>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
