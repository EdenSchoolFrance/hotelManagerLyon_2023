<?php
ob_start();
?>

<section class="chambres">
    <h1>Nos Chambres</h1>
    <div class="allChambres">
        <h3>Toutes nos chambres disponibles...</h3>
        <ul>
            <?php foreach ($chambres as $chambre) { ?>
                <li>
                    <div class="picture">
                        <img src="pictures/<?= $chambre->getImg() ?>" alt="">
                    </div>
                    <div class="content">
                        <h5><?= $chambre->getName() ?></h5>
                        <p><?= $chambre->getDesc() ?></p>
                        <p><?= $chambre->getPrices() ?></p>
                    </div>


                </li>
            <?php } ?>
        </ul>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
