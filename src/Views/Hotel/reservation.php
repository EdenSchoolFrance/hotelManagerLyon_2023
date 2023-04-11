<?php
ob_start();
?>
<h1>Faire une reservation</h1>
<form action="/addReservation" method="POST">
    <p>Prenom : <?= $client->getPrenom() ?></p>
    <p>Nom : <?= $client->getNom() ?></p>
    <p>Email : <?= $client->getEmail() ?></p>
    <label for="chambre">Choisir chambre :</label>
    <select name="chambre" id="chambre">
        <option value="empty">aucune</option>t
        <?php
        foreach($chambres as $chambre){
            ?>
            <option value="<?= $chambre->getId_chambre() ?>"><?= $chambre->getName_chambre() ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit">
</form>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';