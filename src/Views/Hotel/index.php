<?php
ob_start();

?>

<section class="dashboard">
    <h1>Dashboard</h1>
    <p>Application Management Hotel</p>
    <img src="assets/logo.png" alt="logo" class="logo">
</section>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
