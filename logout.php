<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ob_start();
setcookie("id", 2132421,time()+(60*60*24*5), "/", "");
setcookie("pass", loggedout,time()+(60*60*24*5), "/", "");
echo ("<meta http-equiv=\"Refresh\" content=\"2; URL=login.php\"/>Вие успешно излязохте от акаунта си!");
?>