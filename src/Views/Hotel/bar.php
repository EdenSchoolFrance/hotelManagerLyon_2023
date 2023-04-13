<?php
ob_start();
?>

<section class="bar">
    <h1 style="background: url('../pictures/bar_<?= $bar->getId() ?>.jpg') no-repeat;"><?= $bar->getName() ?></h1>
    <div class="allBoisson">
        <ul>
            <?php foreach ($boissons as $boisson) { ?>
                <li>
                    <div class="picture">
                        <img src="../pictures/<?= $boisson->getImg() ?>" alt="">
                    </div>
                    <div class="content">
                        <h5><?= $boisson->getName() ?></h5>
                        <p class="desc"><?= $boisson->getDesc() ?></p>
                        <p class="price"><?= $boisson->getPrice() ?>€ /personne</p>
                        <div class="reservation">
                            <p class="stock">Encore <?= $boisson->getStock() ?> en stock</p>
                            <a href='/commandBoisson/<?= $boisson->getId() ?>'>commander</a>
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
