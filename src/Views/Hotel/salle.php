<?php
ob_start();
?>

<section class="client">
    <h1>information sur les salle</h1>

    <div class="flex">
        <a href="../salle/create"><h3>reserver</h3></a>
    </div>

</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
