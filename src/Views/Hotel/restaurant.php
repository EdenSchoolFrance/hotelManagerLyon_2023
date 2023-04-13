<?php
ob_start();
?>

<section class="restaurant">
    <h1 style="background: url('../pictures/restaurant_<?= $restaurant->getId() ?>.jpg') no-repeat;"><?= $restaurant->getName() ?></h1>
    <div class="allMenu">
        <ul>
            <?php foreach ($menus as $menu) { ?>
                <li>
                    <div class="picture">
                        <img src="../pictures/<?= $menu->getImg() ?>" alt="">
                    </div>
                    <div class="content">
                        <h5><?= $menu->getName() ?></h5>
                        <p class="desc"><?= $menu->getDesc() ?></p>
                        <div class="reservation">
                            <p class="price"><?= $menu->getPrice() ?>€ /personne</p>
                            <a href='/commandMenu/<?= $menu->getId() ?>'>commander</a>
                        </div>
                    </div>

                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
