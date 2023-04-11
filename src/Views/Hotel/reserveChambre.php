<?php
ob_start();
?>

<section class="reserveChambre">
    <h1 style="background: url('../pictures/<?= $chambre->getImg() ?>') no-repeat;">Réserver la <?= $chambre->getName() ?></h1>
    <div class="reserveForm">
        <form action="/validReserveChambre" method="post">

        </form>
    </div>
</section>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
