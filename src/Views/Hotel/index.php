<?php
ob_start();
?>
<h1>Home</h1>
<a href="/reservation" class="cta">Faire une rédervation client</a>


<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
