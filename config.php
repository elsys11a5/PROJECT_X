<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ob_start(); // allows you to use cookies
$conn = mysql_connect("localhost","root","riotsux1");
mysql_select_db("project_x") or die(mysql_error());
//fill in the above lines where there are capital letters.
$logged = MYSQL_QUERY("SELECT * from users WHERE id='$_COOKIE[id]' AND password = '$_COOKIE[pass]'");
//$logged = MYSQL_QUERY("SELECT * from users WHERE @id='$[id]' AND @password = '[pass]'");
$logged = mysql_fetch_array($logged);
//the above lines get the user's information from the database.
?>