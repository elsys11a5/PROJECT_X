<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
		ob_start();
		// Позволява бисквитки
		include("config.php");
		// Използва config.php
		if ($_POST['register']) {
		// Проверка... АКО формата е изпратена
		$username = $_POST[username];
		$password = $_POST[pass];
		$cpassword = $_POST[cpass];
		$email = $_POST[emai1];
		//Въвежда променливите с информация зададена от потребителя
			if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) 
			{
			//проверка за празни полета
			echo "Оставили сте празно поле!";
				}else{
			//Няма празни полета! => Продължаваме...
				if($password != $cpassword) {
			//Проверка за паролите
				echo "Паролите не съвпадат!";
				}else{
			//Паролите са си O.K.! => Продължавамe...
				$password = md5($password);
			//Криптира паролата при изпращане на заявката
				$checkname = mysql_query("SELECT username FROM users WHERE username='$username'");
				$checkname= mysql_num_rows($checkname);
				$checkemail = mysql_query("SELECT email FROM users WHERE email='$email'");
				$checkemail = mysql_num_rows($checkemail);
				if ($checkemail>0|$checkname>0) {
			//Проверка дали няма вече такъв регистриран потребител.има => чупи цикала и плюе:
				echo "The username or email is already in use";
					}else{
					// или, ако никой не използва този username и email ... => продължаваме
					$username = htmlspecialchars($username);
					$password = htmlspecialchars($password);
					$email = htmlspecialchars($email);
					// тук се уверяваме да не се изпрати случайно html код.
					// Всичко бачка чудесно => INSERT
					$query = mysql_query("INSERT INTO users (username, password, email) VALUES('$username','$password','$email')"); 
					// Добавя информацията в DB в таблица users
					echo "Вие успешно се регистрирахте!";
					}
				}
			}
		}else{
		// формата не е попълнена правилно => хаййде на ново
		echo ("
		<center>
		<form method=\"POST\">
		Потребителско име: <input type=\"text\" size=\"15\" maxlength=\"25\" name=\"username\"><br/>
		Парола: <input type=\"password\" size=\"15\" maxlength=\"25\" name=\"pass\"><br/>
		Повторете паролата: <input type=\"password\" size=\"15\" maxlength=\"25\" name=\"cpass\"><br/>
		Email адрес: <input type=\"text\" size=\"15\" maxlength=\"25\" name=\"emai1\"><br/>
		<input name=\"register\" type=\"submit\" value=\"Регистрирай се\">
		</form>
		</center>
		");
		}
?>