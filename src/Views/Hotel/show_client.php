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
            <th>Restaurants</th>
            <th>Piscines</th>
            <th>Salles</th>
            <th>Bars</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach ($clients as $client) {
            $_SESSION["user"]["id_user"] = $client->getid_client(); ?>
            <tr>
                <td><?= $client->getid_client(); ?></td>
                <td><?= $client->getprenom_client(); ?></td>
                <td><?= $client->getnom_client(); ?></td>
                <td><?= $client->getemail_client(); ?></td>
                <td><a href="/chambres/">Reserver une chambre</a></td>
                <td><a href="/restaurants/">Consommation au restaurant</a></td>
                <td><a href="/piscines/">Reserver une piscine</a></td>
                <td><a href="/salles/">Reserver une salle</a></td>
                <td><a href="/bars/">Consommation au bar</a></td>
                <td>
                    <form action="/client/supprimer" method="post">
                        <input type="hidden" name="id" value="<?= $client->getid_client() ?>">
                        <input type="hidden" name="prenom" value="<?= $client->getprenom_client() ?>">
                        <input type="hidden" name="nom" value="<?= $client->getnom_client() ?>">
                        <input type="hidden" name="email" value="<?= $client->getemail_client() ?>">
                        <button type="submit">Supprimer la personne</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php if (isset($_SESSION["error"]['username'])) {
        echo "<h2>" . $_SESSION["error"]['username'] . "</h2>";
    } ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
