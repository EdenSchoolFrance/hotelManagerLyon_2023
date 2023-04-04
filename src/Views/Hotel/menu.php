<?php
ob_start();
?>
<h1>menu</h1>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>