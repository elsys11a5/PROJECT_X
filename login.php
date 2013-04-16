<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ob_start();
// allows you to use cookies.
include("config.php");
	if(!$logged['username'])
	{
		if(!$_POST['login'])
			{
			echo('
			<center><form method="POST">
			<table>
			<tr>
			<td align="right">
			Потребител: <input type="text" size="15" maxlength="25" name="username">
			</td>
			</tr>
			<tr>
			<td align="right">
			Парола: <input type="password" size="15" maxlength="25" name="password">
			</td></tr><tr>
			<td align="center">
			<input type="submit" name="login" value="Влез" id="login">
			</td></tr><tr>
			<td align="center">
			<a href="register.php">Регистрирай се</a>
			</td></tr></table></form></center>');
			}
		 if ($_POST['login']) {
	// the form has been submitted. We continue...
	$username=$_POST['username'];
	$password = md5($_POST['password']);
	// the above lines set variables with the submitted information.
	$info = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());
	$data = mysql_fetch_array($info);
	if($data[password] != $password) {
	// the password was not the user's password!
	echo "Грешен потребител или парола!";
	}else{
	// the password was right!
	$query = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());
	$user = mysql_fetch_array($query); 
	// gets the user's information
	setcookie("id", $user[id],time()+(60*60*24*5), "/", "");
	setcookie("pass", $user[password],time()+(60*60*24*5), "/", "");
	// the above lines set 2 cookies. 1 with the user's id and another with his/her password.
	echo ("<meta http-equiv=\"Refresh\" content=\"2; URL=login.php\"/>Вие успешно влязохте в акаунта си.");
	// modify the above line...add in your site url instead of yoursite.com
	}
	}
	}
	else
	{
	// we now display the user controls.
	echo ("<center>Добре дошли <b>$logged[username]</b><br/></center>
	<a href=\"editprofile.php\">Промени профила си</a><br/>
	<a href=\"members.php\">Виж всички регистрирани потребители</a><br/>
	<a href=\"logout.php\">Излез от акаунта си</a>");
	}
?>