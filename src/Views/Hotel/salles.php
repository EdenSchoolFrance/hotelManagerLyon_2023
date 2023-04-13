<?php
ob_start();
?>

<section class="salles">
    <h1>Nos Salles Evenmentielles</h1>
    <div class="allSalles">
        <ul>
            <?php foreach ($salles as $salle) { ?>
                <li>
                    <div class="picture">
                        <img src="pictures/<?= $salle->getImg() ?>" alt="">
                    </div>
                    <div class="content">
                        <h5><?= $salle->getName() ?></h5>
                        <p class="desc"><?= $salle->getDesc() ?></p>
                        <div class="reservation">
                            <a href="/reserveSalle/<?= $salle->getId() ?>">reserver</a>
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
