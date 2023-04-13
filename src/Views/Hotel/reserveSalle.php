<?php
ob_start();
?>

<section class="reserveSalle">
    <h1 style="background: url('../pictures/<?= $salle->getImg() ?>') no-repeat;">Réserver la <?= $salle->getName() ?></h1>
    <div class="reservations">
        <?php
        if ($reservations->rowCount() > 0) {
        ?>
            <h3>La <?= $salle->getName() ?> est déja réserver aux dates suivantes :</h3>
            <ul>
                <?php while ($ligne = $reservations->fetch()) { ?>
                    <li>du <?= date_format(date_create($ligne['date_debut_reservation_salle']), "d-m-Y") ?> au <?= date_format(date_create($ligne['date_fin_reservation_salle']), "d-m-Y") ?> par <?= $ligne['prenom_client'] . ' ' .  $ligne['nom_client'] ?></li>
                <?php } ?>

            </ul>
        <?php } else { ?>
            <h3>Cette salle n'est pas encore réservée...</h3>
        <?php } ?>
    </div>
    <div class="reserveForm">
        <form action="/validReserveSalle" method="post">
            <input type="hidden" value="<?= $salle->getId() ?>" name="idSalle">
            <select name="client" id="client">
                <option value="0">-- Choisissez un client --</option>
                <?php foreach ($clients as $client) { ?>
                    <option value="<?= $client->getId() ?>"><?= $client->getMail() ?></option>
                <?php } ?>
            </select>
            <div class="input-label">
                <label for="date_debut">Sélectionner la date de début du séjour :</label>
                <input type="date" name="date_debut" id="date_debut">
            </div>
            <div class="input-label">
                <label for="date_fin">Sélectionner la date de fin du séjour :</label>
                <input type="date" name="date_fin" id="date_fin">
            </div>
            <?php if (isset($_SESSION['error'])) {
                if (isset($_SESSION['error']['client'])) {
                    echo "<p class='error'>" . $_SESSION['error']['client'] . "</p>";
                } else if (isset($_SESSION['error']['date'])) {
                    echo "<p class='error'>" . $_SESSION['error']['date'] . "</p>";
                } else if (isset($_SESSION['error']['dispo'])) {
                    echo "<p class='error'>" . $_SESSION['error']['dispo'] . "</p>";
                }
            } ?>
            <button type="submit" class="btn">Réserver</button>

        </form>


    </div>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
