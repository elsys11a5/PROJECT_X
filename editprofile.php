<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ob_start();
include("config.php");
if ($logged[username])
		{
				// При успешен вход => Продължаваме...
				if (!$_POST[update])
			{
				// Формата не е била изпратена => Продължаваме...
				$profile = mysql_query("SELECT * from users where username = '$logged[username]'");
				$profile = mysql_fetch_array($profile);
				// Взима информацията от DB и я показва в html формата.
				echo(" 
				<center><form method=\"POST\">
				<table width=\"100%\">
				<tr>
				<td align=\"right\" width=\"25%\">
				Потребител:
				</td>
				<td align=\"left\">
				<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"username\" value=\"$profile[username]\">
				</td>
				<tr>
				<td align=\"right\" width=\"25%\">
				Име
				</td>
				<td align=\"left\">
				<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"first_name\" value=\"$profile[first_name]\">
				<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"last_name\" value=\"$profile[last_name]\">
				</td>
				</td>
				</tr>
				<tr>
				<td align=\"right\" width=\"25%\">
				Location
				</td>
				<td align=\"left\">
				<input type=\"text\" size=\"25\" maxlength=\"25\" name=\"locate\" value=\"$profile[location]\"></td>
				</tr>
				<tr>
				<td align=\"right\" width=\"25%\">
				Skype
				</td>
				<td align=\"left\">
				<input size=\"25\" name=\"skype\" value=\"$profile[skype]\"></td>
				</tr>
				<tr>
				<td align=\"right\" width=\"25%\">
				Facebook</td>
				<td align=\"left\">
				<input size=\"25\" name=\"facebook\" value=\"$profile[facebook]\"></td>
				</tr>
				<tr>
				<td align=\"right\" width=\"25%\">
				Email адрес</td>
				<td align=\"left\">
				<input size=\"25\" name=\"email\" value=\"$profile[email]\"></td>
				</tr>
				<tr>
				<td align=\"center\">
				</td>
				<td align=\"left\">
				<input type=\"submit\" name=\"update\" value=\"Обнови\"></td>
				</tr>
				</table>
				</form>
				</center>");
			}
		else 
			{
				$username = htmlspecialchars($_POST[username]);
				$first_name = htmlspecialchars($_POST[first_name]);
				$last_name = htmlspecialchars($_POST[last_name]);
				$password = htmlspecialchars($_POST[password]);
				$gender = htmlspecialchars($_POST[gender]);
				$facebook = htmlspecialchars($_POST[facebook]);
				$skype = htmlspecialchars($_POST[skype]);
				$locate = htmlspecialchars($_POST[locate]);
				// махаме html от заявката
				echo ("Вашия профил е успешно обновен!"); 
				$update = mysql_query("Update users set email = '$email', 
				skype = '$skype', facebook = '$facebook', location = '$locate',
				first_name = '$first_name', last_name = '$last_name',
				gender = '$gender', username = '$username',
				where username = '$logged[username]'"); 
				// Обновява информацията в базата данни
			}
		}
	else 
	{ 
	// Ако НЕ са се логнали
	echo ("<a href=\"login.php\">Не сте логнат!</a>"); 
	} 
?>