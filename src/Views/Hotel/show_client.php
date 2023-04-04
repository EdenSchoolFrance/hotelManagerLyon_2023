<?php
ob_start();
?>

<section class="show_client">
    <h1>Hello World !</h1>
    <?= print_r($client) ?>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
