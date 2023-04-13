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
                    <p>description de la salle : <?=$reservations->getDescriptionSalle()?></p>
                    <p>type de la salle : <?=$reservations->getTypeSalle()?></p>
                    <p>option de la salle : <?=$reservations->getOptionsSalle()?></p>
                    <p>status de la salle : <?=$reservations->getStatusSalle()?></p>
                    <p>date de debut : <?=$reservations->getDateDebutReservationSalle()?></p>
                    <p>date de fin : <?=$reservations->getDateFinReservationSalle()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservations->getImageSalle()?>" alt="image de la salle">
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
                    <p>description de la piscines : <?=$reservationPiscines->getDescriptionPiscine()?></p>
                    <p>status de la piscines : <?=$reservationPiscines->getStatusPiscine()?></p>
                    <p>date de debut : <?=$reservationPiscines->getDateDebutReservationPiscine()?></p>
                    <p>date de fin : <?=$reservationPiscines->getDateFinReservationPiscine()?></p>
                    <p>ouverture de la piscines : <?=$reservationPiscines->getOuverturePiscine()?></p>
                    <p>fermeture de la piscines : <?=$reservationPiscines->getFermeturePiscine()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationPiscines->getImagePiscine()?>" alt="image de la piscine">
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
                    <p>description de la Chambre : <?=$reservationChambres->getDescriptionChambre()?></p>
                    <p>status de la Chambre : <?=$reservationChambres->getStatusChambre()?></p>
                    <p>date de debut : <?=$reservationChambres->getDateDebutReservationChambre()?></p>
                    <p>date de fin : <?=$reservationChambres->getDateFinReservationChambre()?></p>
                    <p>nombre d'occupent de la Chambre : <?=$reservationChambres->getOccupeChambre()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationChambres->getImageChambre()?>" alt="image de la chambre">
                </div>
            </div>
    <?php
        }
        foreach ($reservationBoisson as $reservationBoissons) {
    ?>
            <div class="reservationsClient">
                <div class="left">
                    <p>numero de la commande : <?=$reservationBoissons->getNumCommendeBoisson()?></p>
                    <p>nom de la Boisson : <?=$reservationBoissons->getNameBoisson()?></p>
                    <p>description de la boisson : <?=$reservationBoissons->getDescriptionBoisson()?></p>
                    <p>date de la commande : <?=$reservationBoissons->getDateClientBoisson()?></p>
                    <p>quantite: <?=$reservationBoissons->getQuantiteClientBoisson()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationBoissons->getImageBoisson()?>" alt="image de la boisson">
                </div>
            </div>
    <?php
        }
        foreach ($reservationMenu as $reservationMenus) {
    ?>
            <div class="reservationsClient">
                <div class="left">
                    <p>numero de la commande : <?=$reservationMenus->getNumCommendeMenu()?></p>
                    <p>nom de la Menu : <?=$reservationMenus->getNameMenu()?></p>
                    <p>description de la boisson : <?=$reservationMenus->getDescriptionMenu()?></p>
                    <p>date de la commande : <?=$reservationMenus->getDateClientMenu()?></p>
                    <p>quantite: <?=$reservationMenus->getQuantiteClientMenu()?></p>
                </div>
                <div class="right">
                    <img src="/img/<?=$reservationMenus->getImageMenu()?>" alt="image du menu">
                </div>
            </div>
    <?php
        }
    ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';