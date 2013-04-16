<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ob_start();
include("config.php");
if (!$_GET[user])
{
	$getuser = mysql_query("SELECT * from users order by id asc");
	while ($user = mysql_fetch_array($getuser))
	{
		// Вика всичко от таблица user
		echo ("<a href=\"members.php?user=$user[username]\">$user[username]</a><br/>\n");
		// Генериран линк към профила на потребител.
	}
}
ELSE
{ 
	$getuser = mysql_query("SELECT * from users where username = '$_GET[user]'");
	$usernum = mysql_num_rows($getuser);
	if ($usernum == 0)
	{
		echo ("Няма потребители");
	}
	else
	{
		$profile = mysql_fetch_array($getuser);
		echo ("<center><b>Сега разглеждате профила на: $profile[username]</b> с юзърклас <b>$profile[type]</b> <br/></center>
		Име: $profile[first_name] $profile[last_name]<br/>
		Пол: $profile[gender]<br/>
		Facebook: $profile[facebook]<br/>
		Skype: $profile[skype]<br/>
		Location: $profile[location]<br/>
		Email адрес: $profile[email]<br/>");
		// тук викаме информацията за потребителя от базата данни от таблица users (17ред)
	}
} 
?>