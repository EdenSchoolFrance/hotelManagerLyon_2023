<?php
ob_start();
$total = 0;
?>
<h1>Factures</h1>
<p>Client : <?= $client->getPrenom() ?> <?= $client->getNom() ?></p>
<p>Email : <?= $client->getEmail() ?></p>
<h2>Reservation :</h2>
<table>
    <tr>
        <th>Type</th>
        <th>nom</th>
        <th>date debut</th>
        <th>date fin</th>
        <th>prix</th>
    </tr>
    <?php
    foreach($chambres as $chambre){
        $total += $chambre->getPrix_chambre();
        ?>
        <tr>
            <td>Chambre</td>
            <td><?= $chambre->getName_chambre()?></td>
            <td><?= $chambre->getDate_debut_reservation_chambre()?></td>
            <td><?= $chambre->getDate_fin_reservation_chambre()?></td>
            <td><?= $chambre->getPrix_chambre()?>€</td>
        </tr>
        <?php
    }
    ?>
        <?php
    foreach($piscines as $piscine){
        $total += $piscine->getPrix_piscine();
        ?>
        <tr>
            <td>Piscine</td>
            <td><?= $piscine->getName_piscine()?></td>
            <td><?= $piscine->getDate_debut_reservation_piscine()?></td>
            <td><?= $piscine->getDate_fin_reservation_piscine()?></td>
            <td><?= $piscine->getPrix_piscine()?>€</td>
        </tr>
        <?php
    }
    ?>
        <?php
    foreach($salles as $salle){
        $total += $salle->getPrix_salle();
        ?>
        <tr>
            <td>Salle</td>
            <td><?= $salle->getName_salle()?></td>
            <td><?= $salle->getDate_debut_reservation_salle()?></td>
            <td><?= $salle->getDate_fin_reservation_salle()?></td>
            <td><?= $salle->getPrix_salle()?>€</td>
        </tr>
        <?php
    }
    ?>
</table>
<h2>Commande :</h2>
<table>
    <tr>
        <th>Type</th>
        <th>nom</th>
        <th>quantite</th>
        <th>prix unit</th>
        <th>total</th>
    </tr>
    <?php
    foreach($boissons as $boisson){
        $total += ($boisson->getPrix_boisson()*$boisson->getQuantite_client_boisson());
        ?>
        <tr>
            <td>Boisson</td>
            <td><?= $boisson->getName_boisson()?></td>
            <td><?= $boisson->getQuantite_client_boisson()?></td>
            <td><?= $boisson->getPrix_boisson()?>€</td>
            <td><?= ($boisson->getPrix_boisson()*$boisson->getQuantite_client_boisson())?>€</td>
        </tr>
        <?php
    }
    ?>
        <?php
    foreach($menus as $menu){
        $total += ($menu->getPrix_menu()*$menu->getQuantite_client_menu());
        ?>
        <tr>
            <td>Menu</td>
            <td><?= $menu->getName_menu()?></td>
            <td><?= $menu->getQuantite_client_menu()?></td>
            <td><?= $menu->getPrix_menu()?>€</td>
            <td><?= ($menu->getPrix_menu()*$menu->getQuantite_client_menu())?>€</td>
        </tr>
        <?php
    }
    ?>
</table>
<p>Total à payer : <?= $total ?>€</p>
<form action="/addFacture" method="POST">
    <input type="hidden" value="<?= $total ?>" name="total">
    <input type="hidden" value="<?= $client->getId()?>" name="clientId">
    <input type="submit" value="Créer la facture">
</form>
<h3>Facture Payer :</h3>
<?php 
if($factures == null){
    ?>
    <p>Aucune facture payer pour le moment</p>
    <?php
}else{
?>
<table>
    <tr>
        <th>Client</th>
        <th>numero de facture</th>
        <th>date</th>
        <th>total</th>
    </tr>
    <?php
        foreach($factures as $facture){
    ?>
    <tr>
        <td><?= $client->getPrenom() ?> <?= $client->getNom() ?></td>
        <td><?= $facture->getNum_reference()?></td>
        <td><?= $facture->getDate_facture()?></td>
        <td><?= $facture->getTotal_ttc()?>€</td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
$content = ob_get_clean();
require VIEWS . 'layout.php';