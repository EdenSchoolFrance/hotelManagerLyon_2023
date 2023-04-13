<?php
ob_start();
?>
Bienvenue sur HotelManager
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';