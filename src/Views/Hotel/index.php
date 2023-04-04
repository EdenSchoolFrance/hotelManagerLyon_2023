<?php
ob_start();
?>
<p>index</p>
<?php print_r($_SESSION['user']);
?>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
