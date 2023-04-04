<?php
ob_start();
?>

<section class="homepage">
    <h1>Hello World!</h1>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
