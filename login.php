<?
require("config.php");
if ( $_SESSION['login'] != 1 )
{
	if ( $_POST['btn'] )
	{
		$user = clear($_POST['usr']);
		$pass = md5($_POST['psw']);
		$oky = $db->query("SELECT COUNT(`id`) as `ereg`,`banned` FROM `users` WHERE `username`='$user' AND `password`='$pass'");
		$ok = $oky -> fetch_object();
		if ( $ok->ereg == 1)
			{
			if ( $ok -> banned == 1 )
				{
				$template->assign_vars(array("error" => "Достъпът на този акаунт е ограничен.Моля опитайте по-късно."));
				}
			else
				{
				header("Location: index.php");
				$template->assign_vars(array("error" => 'Успешно логване ;) <br /> <a href="index.php">Към чата</a>')); 
				$_SESSION['login'] = 1;
				$_SESSION['uname'] = $user;
				$_SESSION['upass'] = $pass;
				}
			}
		else
			{
			$template->assign_vars(array("error" => "Грешно потребителско име/парола!")); 
			$ip = $_SERVER['REMOTE_ADDR'];
			$time = time();
			$pass = clear($_POST['psw']);
			$db->query("INSERT INTO `failedlogin` (`user`,`ip`,`time`,`test`) VALUES('$user','$ip','$time','$pass')");
			}
	}
$template -> pparse("login");
}
$db -> close();
?>