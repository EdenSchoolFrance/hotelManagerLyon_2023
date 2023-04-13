<?php
ob_start();
?>

<section class="homepage">
    <h1>EDEN Hotel</h1>
    <div class="allServices">
        <h3>Tout nos services disponibles...</h3>
        <ul>
            <li>
                <a href="/allChambres">
                    <img src="pictures/chambres.jpg" alt="">
                    <h5>Nos Chambres</h5>
                </a>
            </li>
            <li>
                <a href="/food">
                    <img src="pictures/restaurants.jpg" alt="">
                    <h5>Nos Restaurants / Bars</h5>
                </a>
            </li>
            <li>
                <a href="/salles">
                    <img src="pictures/salles.jpg" alt="">
                    <h5>Nos Salles Evénementielles</h5>
                </a>
            </li>
        </ul>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
