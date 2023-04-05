<?php
ob_start();
?>
Hi
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';