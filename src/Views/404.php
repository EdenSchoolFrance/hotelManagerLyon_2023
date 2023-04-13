<?php
ob_start();
if(isset($_SESSION['error'])){
    echo "<p style='text-align : center;'>".$_SESSION['error']."</p>";
}
?>

<section class="error">
    <h1>404 :</h1>
    <p>page not found</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
