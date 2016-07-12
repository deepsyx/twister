<? require("config.php"); 
if ( $_SESSION['login'] != 1 )
{
	if ( $_POST['btn'] )
	{
		$template->assign_vars(array("color" => "red")); 
			// Vhodni danni
			$user = clear($_POST['username']);
			$pass = md5($_POST['psw']);
			$mail = clear($_POST['mail']);
			$rname = clear($_POST['rname']);
			$pass_c = md5($_POST['psw_c']);
			
			$born_day = trim($_POST['born_day']);
			$born_month = trim($_POST['born_month']);
			$born_year = trim($_POST['born_year']);
			
			if ( is_numeric($born_day) && is_numeric($born_month) && is_numeric($born_year) )
			{
			$birthday = "$born_year-$born_month-$born_day";
			}
			//echo $birthday;

			// krai 
		
		$testa = $db->query("SELECT COUNT(`id`) as `broi` FROM `users` WHERE `username`='$user'");
		$test = $testa -> fetch_assoc();
		
		if ( !$rname OR empty($rname) ) { $rname = $user; }

		if(preg_match("/^[a-zA-Z0-9]+$/", $user) == 1)
		{
			if ( $test['broi'] == 1 )
			{
			$template->assign_vars(array("error" => "Потребител с такова име вече съществува!")); 
			}
			else
			{
				if ( $pass_c == $pass )
				{
					if ( $_SESSION['code'] == $_POST['code'] )
					{
					if ( empty($user) || empty($pass) || empty($mail) || empty($rname) )
						{
						$template->assign_vars(array("error" => "Всички полета са задължителни!")); 
						}
					else
						{
						if ( strlen($user) > 30 || strlen($user) < 5 )
							{
							$template->assign_vars(array("error" => "Потребителското име трябва да съдържа между 5 и 30 символа!"));
							}
						else
							{
							
								if ( validemail($mail) )
								{
								
							$time = time();
							$ip = $_SERVER['REMOTE_ADDR'];
							$reg = $db->query("INSERT INTO `users` (`username`,`password`,`regip`,`regdate`,`rname`,`born`) VALUES('$user','$pass','$ip','$time','$rname','$birthday')");
							
							$db->query("INSERT INTO `personalize` (`id`,`bg`,`bg_fast`,`text_fast`,`bg_users`,`text_users`,`lenta`,`events`) VALUES('$db->insert_id','8cbeff','FFFFFF','000000','FFFFFF','000000','77a2d9','000000')");
								if ( $reg )
									{
									$template->assign_vars(array("color" => "green")); 
									$template->assign_vars(array("error" => 'Успешна регистрация. Можете да влезнете с акаунта си ;) <br /> <a href="index.php">Влез</a>'));
									}
								else
									{
									$template->assign_vars(array("error" => 'Грешка при регистрация!<br /> Администраторът е уведомен и проблемът ще бъде оправен в най-скоро време.'));
									}
								}
								else
								{
								$template->assign_vars(array("error" => 'Грешка при регистрация!<br /> Невалиден Email адрес.'));
								}
									
							}
						}	
					}
					else
					{
					$template->assign_vars(array("error" => 'Потвърдителният код не е въведен правилно!'));
					}
				}
				else
				{
				$template->assign_vars(array("error" => 'Паролите не съвпадат!'));
				}
			}
		}
		else
		{
		$template->assign_vars(array("error" => 'Потребителското име/Псевдоним може да съдържа буквите: A-Z,0-9!'));
		}
	}

$template->pparse("register");
$db->close();
}
?>


