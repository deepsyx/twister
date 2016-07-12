<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } else {

	$id = clear($_GET['id']);

	if ( is_numeric($id) && $id != '' )
	{
		$resy = $db->query("SELECT COUNT(`id`) as `broi` FROM `friends` WHERE `id`='$logged[id]' AND `friend`='$id'");
		$res = $resy -> fetch_assoc();
		if ( $res['broi'] == 1 )
			{
			$do = $db->query("DELETE FROM `friends` WHERE `id`='$logged[id]' AND `friend`='$id'");
			if ( $do )
				{
				$template->assign_vars(array("error" => "Абонатът е премахнат от вашия приятелски лист успешно!"));
				}
			else
				{
				$template->assign_vars(array("error" => "Грешка при премахване!"));
				}
			}
		else
			{
			$template->assign_vars(array("error" => "Абонатът не ви е приятел!"));
			}
	}
	else
		{
		$template->assign_vars(array("error" => "Невалидно!"));
		}

			$template -> pparse("error_page");
		
	$db->close();
}
?>