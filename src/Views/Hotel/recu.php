<?php
ob_start();
?>

<section class="recu">
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/caraibes1.jpg" class="d-block w-100" alt="plage des caraibes">
            </div>
            <div class="carousel-item">
                <img src="/assets/maldives.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/assets/6412ec575a81a.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class='background_blue'>
        <img src="/assets/logo.png" alt="pheonix logo">
        <p>
            Récapitulatif de votre réservation pour <?=$voyages->getNomDestination()?>
        </p>
    </div>
    <div class='recap'>
        <div class='background_orange phrase'>
            participant(s)
        </div>
        <div class='background_orange nombre'>
            <?=$cherche[0]->getNParticipant()?>
        </div>
        <div class='background_vert phrase'>
            Commande
        </div>
        <div class='background_vert nombre'>
            <?=$cherche[0]->getNCommande()?>
        </div>
    </div>
    <div class='recap'>
        <div class='background_orange phrase'>
            Semaine(s) :
        </div>
        <div class='background_orange nombre'>
            <?=$cherche[0]->getNSemaines()?>
        </div>
        <div class='background_vert phrase'>
            Total
        </div>
        <div class='background_vert nombre'>
            <?=$cherche[0]->getPrixTotal()?>
        </div>
    </div>
    <div class='background_blue right'>
        <p>Bon séjour</p>
        <img src="/assets/logo.png" alt="pheonix logo">
    </div>
    <div class="allVoyages">
        <?php
        foreach ($Allvoyages as $voyage) {
        ?>
        <a href="/reservation/<?=$voyage->getIdDestination()?>">
            <img src="/assets/<?= $voyage->getIdDestination() . '.' .    $voyage->getFormatImgDestination() ?>" alt="image de <?=   $voyage->getNomDestination() ?>" class="petit-img">
        </a>
                    
        <?php
        }
        ?>
    </div>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layoutOther.php';
