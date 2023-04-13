<?php
ob_start();
?>

<section class="chambres">
    <h1>Nos Chambres</h1>
    <div class="allChambres">
        <ul>
            <?php foreach ($chambres as $chambre) { ?>
                <li>
                    <div class="picture">
                        <img src="pictures/<?= $chambre->getImg() ?>" alt="">
                    </div>
                    <div class="content">
                        <h5><?= $chambre->getName() ?></h5>
                        <p class="desc"><?= $chambre->getDesc() ?></p>
                        <p class="price"><?= $chambre->getPrice() ?>€ /nuit pour 1 personne</p>
                        <div class="reservation">
                            <?php
                            if ($chambre->getOccupe() == 0) {
                                echo "
                                <p class='dispo'>disponible</p>
                                <a href='/reserveChambre/" . $chambre->getId() . "'>reserver</a>
                                ";
                            } else {
                                echo "<p class='occupe'>occupé...</p>";
                            }
                            ?>
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
