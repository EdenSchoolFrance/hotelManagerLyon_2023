<?php
ob_start();

?>

<section class="error">
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
