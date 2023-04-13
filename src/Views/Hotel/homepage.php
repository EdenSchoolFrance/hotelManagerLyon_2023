<?php
ob_start();
?>

<section class="homepage">
    <h1>Homepage</h1>
    <p>une ambiance coucher de soleil</p>
</section>

<?php
$content = ob_get_clean();

require VIEWS . 'layout.php';
