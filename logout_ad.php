<?php
require 'core.inc.php';
$cookie_name = "last_login_time1";
date_default_timezone_set("America/Chicago");

$cookie_value = date("l jS \of F Y h:i:s A");

setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
session_destroy();

header('Location:index1.php ');

?>