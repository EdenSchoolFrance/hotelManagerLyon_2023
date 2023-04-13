<?php
ob_start();
?>
<section class="card">
<h1>Faire une reservation</h1>
<form action="/addReservation" method="POST">
    <input type="hidden" value="<?= $client->getId() ?>" name="clientId">
    <p>Prenom : <?= $client->getPrenom() ?></p>
    <p>Nom : <?= $client->getNom() ?></p>
    <p>Email : <?= $client->getEmail() ?></p>
    <div>
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
        <div class="hidden date">
            <label for="chambreDateDebut">date de début :</label>
            <input type="date" name="chambreDateDebut" value="<?= date('Y-m-d') ?>">
            <label for="chambreDateFin">date de fin :</label>
            <input type="date" name="chambreDateFin" value="<?= date('Y-m-d') ?>">
        </div>
    </div>
    <div>
        <label for="piscine">Choisir piscine :</label>
        <select name="piscine" id="piscine">
        <option value="empty">aucune</option>t
        <?php
        foreach($piscines as $piscine){
            ?>
            <option value="<?= $piscine->getId_piscine() ?>"><?= $piscine->getName_piscine() ?></option>
            <?php
        }
        ?>
        </select>
        <div class="hidden date">
            <label for="piscineDateDebut">date de début :</label>
            <input type="date" name="piscineDateDebut" value="<?= date('Y-m-d') ?>">
            <label for="piscineDateFin">date de fin :</label>
            <input type="date" name="piscineDateFin" value="<?= date('Y-m-d') ?>">
        </div>
    </div>
    <div>
        <label for="salle">Choisir salle :</label>
        <select name="salle" id="salle">
        <option value="empty">aucune</option>t
        <?php
        foreach($salles as $salle){
            ?>
            <option value="<?= $salle->getId_salle() ?>"><?= $salle->getName_salle() ?></option>
            <?php
        }
        ?>
        </select>
        <div class="hidden date">
            <label for="salleDateDebut">date de début :</label>
            <input type="date" name="salleDateDebut" value="<?= date('Y-m-d') ?>">
            <label for="salleDateFin">date de fin :</label>
            <input type="date" name="salleDateFin" value="<?= date('Y-m-d') ?>">
        </div>
    </div>

    <input type="submit" class="button">
</form>
</section>
<script src="../js/reservation.js"></script>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';