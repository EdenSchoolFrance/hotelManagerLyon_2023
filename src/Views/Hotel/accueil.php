<?php
ob_start();
?>
<section>
    <article>
        <h2><a href="/client">Ajouter un client</a></h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/client/client1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/client/client2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/client/client3.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
    <article>
        <h2><a href="/client">Louer une salle</a></h2>
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/salle/salle1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/salle/salle2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/salle/salle3.png' ?>" alt="Third slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/salle/salle4.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
    <article>
        <h2><a href="/client">Louer une piscine</a></h2>
        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/piscine/piscine1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/piscine/piscine2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/piscine/piscine3.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
    <article>
    <h2><a href="/commande">Créer une commande</a></h2>
        <div id="commande" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#commande" data-slide-to="0" class="active"></li>
            <li data-target="#commande" data-slide-to="1"></li>
            <li data-target="#commande" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/commande/commande1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/commande/commande2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/commande/commande3.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#commande" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#commande" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
    <article>
        <h2><a href="/restaurant">Restaurant</a></h2>
        <div id="restaurant" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#restaurant" data-slide-to="0" class="active"></li>
            <li data-target="#restaurant" data-slide-to="1"></li>
            <li data-target="#restaurant" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/restaurant/restaurant1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/restaurant/restaurant2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/restaurant/restaurant3.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#restaurant" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#restaurant" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
    <article>
        <h2><a href="/bar">Nos Bars</a></h2>
        <div id="bar" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#bar" data-slide-to="0" class="active"></li>
            <li data-target="#bar" data-slide-to="1"></li>
            <li data-target="#bar" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="<?= URL . '/img/bar/bar1.png' ?>" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/bar/bar2.png' ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="<?= URL . '/img/bar/bar3.png' ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#bar" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bar" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </article>
</section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';