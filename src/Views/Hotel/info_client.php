<?php
ob_start();
?>

<section class="liste">
    <h1>information sur le client : <?=$client[0]->getNomClient() ." , ".$client[0]->getPrenomClient()?></h1>
    
    <?php
        echo 
        "
        <p>Prenom : ".$client[0]->getPrenomClient()."</p>
        <p>Nom : ".$client[0]->getNomClient()."</p>
        <p>Email : ".$client[0]->getEmailClient()."</p>
        <h2>toute les reservation prise</h2>";
        foreach ($reservation as $reservations) {
    ?>
            <div class="reservationsClient">
                <div class="left">
                    <p>numero de reservation : <?=$reservations->getNumReservationSalle()?></p>
                    <p>nom de la salle : <?=$reservations->getNameSalle()?></p>
                    <p>desciption de la salle : <?=$reservations->getDescriptionSalle()?></p>
                    <p>type de la salle : <?=$reservations->getTypeSalle()?></p>
                    <p>option de la salle : <?=$reservations->getOptionsSalle()?></p>
                    <p>status de la salle : <?=$reservations->getStatusSalle()?></p>
                    <p>date de debut : <?=$reservations->getDateDebutReservationSalle()?></p>
                    <p>date de fin : <?=$reservations->getDateFinReservationSalle()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservations->getImageSalle()?>" alt="">
                </div>
            </div>
    <?php
        }
        foreach ($reservationPiscine as $reservationPiscines) {
    ?>
            <div class="reservationsClient">
                <div class="left">
                    <p>numero de reservation : <?=$reservationPiscines->getNumReservationPiscine()?></p>
                    <p>nom de la piscines : <?=$reservationPiscines->getNamePiscine()?></p>
                    <p>desciption de la piscines : <?=$reservationPiscines->getDescriptionPiscine()?></p>
                    <p>status de la piscines : <?=$reservationPiscines->getStatusPiscine()?></p>
                    <p>date de debut : <?=$reservationPiscines->getDateDebutReservationPiscine()?></p>
                    <p>date de fin : <?=$reservationPiscines->getDateFinReservationPiscine()?></p>
                    <p>ouverture de la piscines : <?=$reservationPiscines->getOuverturePiscine()?></p>
                    <p>fermeture de la piscines : <?=$reservationPiscines->getFermeturePiscine()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationPiscines->getImagePiscine()?>" alt="">
                </div>
            </div>
    <?php
        }
        foreach ($reservationChambre as $reservationChambres) {
    ?>
            <div class="reservationsClient">
                <div class="left">
                    <p>numero de reservation : <?=$reservationChambres->getNumReservationChambre()?></p>
                    <p>nom de la Chambre : <?=$reservationChambres->getNameChambre()?></p>
                    <p>desciption de la Chambre : <?=$reservationChambres->getDescriptionChambre()?></p>
                    <p>status de la Chambre : <?=$reservationChambres->getStatusChambre()?></p>
                    <p>date de debut : <?=$reservationChambres->getDateDebutReservationChambre()?></p>
                    <p>date de fin : <?=$reservationChambres->getDateFinReservationChambre()?></p>
                    <p>nombre d'occupent de la Chambre : <?=$reservationChambres->getOccupeChambre()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationChambres->getImageChambre()?>" alt="">
                </div>
            </div>
    <?php
        }
    ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';