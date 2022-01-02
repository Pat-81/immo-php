<?php ob_start() ?>

<?php
$content =  ob_get_clean();
$title = "Bienvenue chez Immo-Php";
require_once "base.html.php";
?>