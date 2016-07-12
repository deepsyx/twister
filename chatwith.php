<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
else
	{
	$chatwith = clear($_GET['with']);
	$userinfo_s = $db->query("SELECT `id`,`status`,`avatar`,`nastroenie`,`username`,`rname` FROM `users` WHERE `username`='$chatwith'");
	$userinfo = $userinfo_s -> fetch_assoc();


		if ( !isset($userinfo['id']) )
			{
			die("No user...!");
			}
		$pic = status2pic($userinfo['status']);

		$ansa = $db->query("select (select count(`id`) from friends where `id`='$logged[id]' and `friend`='$userinfo[id]') as priatel,(select count(`blockiran`) from blocked where `user`='$chatwith' AND `blockiran`='$logged[username]' ) as blocked");
		// От горния ред съм съединил 2 заявки в една: едната проверява дали е добавен в приятели,а другата дали е блокиран :) 
		
		$ans = $ansa -> fetch_assoc();
			if ( $ans['blocked'] == 1 )
				{
				die("<center><img src=\"images/stop.jpg\"></center>");
				}
				
			if ( $ans['priatel'] == 1 )
				{
				$template->assign_vars(array(
					"button_add" => "rem_button",
						"add_ex" => '0',
					"linka" => "rem_friend.php?id="
				));
				}
				else
				{
				$template->assign_vars(array(
					"button_add" => "dobavi_button",
					"add_ex" => '1',
					"linka" => "search_friend.php?do=add&usera="
				));
				}

			$template->assign_vars(array(
			"chatwith" => $chatwith,
			"status_pic" => status2pic($userinfo['status']),
			"avatar" => $userinfo['avatar'],
			"nastroenie" => $userinfo['nastroenie'],
			"user_id" => $userinfo['id'],
			"rname" => $userinfo['rname']
			));
		
	$template->pparse('chatwith');
	}
$db->close();
?>

