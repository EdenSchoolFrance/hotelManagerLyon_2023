<?php
ob_start();
?>

<section class="restaurant-bar">
    <h1>Nos Restaurants / Bars</h1>
    <div class="allResto">
        <h3>Tout nos restaurants...</h3>
        <ul>
            <?php foreach ($restaurants as $restaurant) { ?>
                <li>
                    <a class="btn" href="/restaurant/<?= $restaurant->getId() ?>"><?= $restaurant->getName() ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="allBar">
        <h3>Tout nos bars...</h3>
        <ul>
            <?php foreach ($bars as $bar) { ?>
                <li>
                    <a class="btn" href="/bar/<?= $bar->getId() ?>"><?= $bar->getName() ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
