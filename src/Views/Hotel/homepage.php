<?php
ob_start();
?>

<section class="homepage">
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
    <div class="btnConteneur">
        <a class="chooseBtn" href="/catalog">Choisir mon séjour tout de suite !</a>
    </div>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
