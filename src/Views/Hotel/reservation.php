<?php
ob_start();
?>

<section class="reserver">
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
    <div id="content">
        <div id="gauche">
            <div id="reservation-img">
                <img src="/assets/<?= $commende->getIdDestination().'.'.$commende->getFormatImgDestination() ?>" alt="image de <?=$commende->getNomDestination() ?>">
            </div>
            <div id="reservation-nom">
                <h2><?= $commende->getNomDestination()?></h2>
            </div>
            <div id="reservation-prix">
                <p>1 semaine / personne : <?= $commende->getPrixDestination()?> €</p>
            </div>
        </div>
        <div id="droite">
            <div class="top">
                <h2>Je complète mes informations de réservation</h2>
                <img src="/assets/logo.png" alt="pheonix logo">
            </div>
            <div class="bottom">
                <form action="/payer" method="POST">
                    <input type="email" name="Email" placeholder="Email de confirmation" required>
                    <input type="number" name="Semaine" placeholder="Je pars combien de semaines ?" required>
                    <input type="number" name="vacanciers" placeholder="Nombre de vacanciers" required>
                    <input type="hidden" name="id_destination" value="<?= $commende->getIdDestination()?>">
                    <input type="submit" value="Confirmer ma réservation">
                </form>
            </div>
        </div>
    </div>
    
    <div class="allVoyages">
        <?php
        foreach ($voyages as $voyage) {
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
