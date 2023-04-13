<?php
ob_start();
?>

<section class="historique-commandes">
    <h1>Historique des commandes de <?= $client->getNom() ?></h1>
    <div class="allReservations">
        <?php if ($reservationsChambre->rowCount() > 0) { ?>
            <h3>Toutes les chambres réservées :</h3>
            <table>
                <tr>
                    <th>Numero Reservation</th>
                    <th>Nom Chambre</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Status</th>
                </tr>
                <?php while ($ligne = $reservationsChambre->fetch()) { ?>
                    <tr>
                        <td><?= $ligne['num_reservation_chambre'] ?></td>
                        <td><?= $ligne['name_chambre'] ?></td>
                        <td><?= date_format(date_create($ligne['date_debut_reservation_chambre']), "d-m-Y") ?></td>
                        <td><?= date_format(date_create($ligne['date_fin_reservation_chambre']), "d-m-Y") ?></td>
                        <td><?php
                            if ($ligne['status_chambre'] == 0) {
                                echo 'non payé';
                            } else {
                                echo 'payé';
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "<h3>Aucunes chambres réservées...</h3>";
        } ?>
    </div>
    <div class="allReservations">
        <?php if ($reservationsSalle->rowCount() > 0) { ?>
            <h3>Toutes les salles réservées :</h3>
            <table>
                <tr>
                    <th>Numero Reservation</th>
                    <th>Nom Salle</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Status</th>
                </tr>
                <?php while ($ligne = $reservationsSalle->fetch()) { ?>
                    <tr>
                        <td><?= $ligne['num_reservation_salle'] ?></td>
                        <td><?= $ligne['name_salle'] ?></td>
                        <td><?= date_format(date_create($ligne['date_debut_reservation_salle']), "d-m-Y") ?></td>
                        <td><?= date_format(date_create($ligne['date_fin_reservation_salle']), "d-m-Y") ?></td>
                        <td><?php
                            if ($ligne['status_salle'] == 0) {
                                echo 'non payé';
                            } else {
                                echo 'payé';
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "<h3>Aucunes salles réservées...</h3>";
        } ?>
    </div>
    <div class="allReservations">
        <?php if ($consommationsBar->rowCount() > 0) { ?>
            <h3>Toutes les boissons consommées :</h3>
            <table>
                <tr>
                    <th>Nom Boisson</th>
                    <th>Prix Unité</th>
                    <th>Quantité achetée</th>
                    <th>Total</th>
                    <th>Date d'achat</th>
                    <th>Status</th>
                </tr>
                <?php while ($ligne = $consommationsBar->fetch()) { ?>
                    <tr>
                        <td><?= $ligne['name_boisson'] ?></td>
                        <td><?= $ligne['prix_un_boisson'] ?>€</td>
                        <td><?= $ligne['quantite_client_boisson'] ?></td>
                        <td><?= $ligne['quantite_client_boisson'] * $ligne['prix_un_boisson'] ?>€</td>
                        <td><?= date_format(date_create($ligne['date_client_boisson']), "d-m-Y") ?></td>
                        <td><?php
                            if ($ligne['status_boisson'] == 0) {
                                echo 'non payé';
                            } else {
                                echo 'payé';
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "<h3>Aucunes boissons consommées...</h3>";
        } ?>
    </div>
    <div class="allReservations">
        <?php if ($consommationsRestaurant->rowCount() > 0) { ?>

            <h3>Tout les menus consommées :</h3>
            <table>
                <tr>
                    <th>Nom Menu</th>
                    <th>Prix Unité</th>
                    <th>Quantité achetée</th>
                    <th>Total</th>
                    <th>Date d'achat</th>
                    <th>Status</th>
                </tr>
                <?php while ($ligne = $consommationsRestaurant->fetch()) { ?>
                    <tr>
                        <td><?= $ligne['name_menu'] ?></td>
                        <td><?= $ligne['prix_un_menu'] ?>€</td>
                        <td><?= $ligne['quantite_client_menu'] ?></td>
                        <td><?= $ligne['quantite_client_menu'] * $ligne['prix_un_menu'] ?>€</td>
                        <td><?= date_format(date_create($ligne['date_client_menu']), "d-m-Y") ?></td>
                        <td><?php
                            if ($ligne['status_menu'] == 0) {
                                echo 'non payé';
                            } else {
                                echo 'payé';
                            }
                            ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo "<h3>Aucuns menus consommés...</h3>";
        } ?>
    </div>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
