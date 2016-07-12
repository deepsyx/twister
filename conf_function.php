<?
require("config.php");
$action = clear($_GET['action']);
$chat = clear($_GET['chat']);
$user = clear($_GET['u']);

if ( is_numeric($chat) && is_numeric($user) )
	{

	if ( $action == 1 )
		{
					$q = $db->query("select (SELECT COUNT(`user_id`) FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$logged[id]') as broi,(SELECT COUNT(`id`) FROM `users` WHERE `id`='$user') as exist,(SELECT COUNT(`user_id`) FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$user') as ima");
					$res = $q -> fetch_object();
					if ( $res->broi == 1 && $res->exist == 1 && $res->ima == 0 )
						{
						$a = $db->query("INSERT INTO `conf_users` (`chat_id`,`user_id`) VALUES('$chat','$user')");
							if ( $a )
								{
								header("Location: conf_chat.php?id=$chat");
								die("Uspeshno dobaviane!");
								}
							else
								{
								die("System Error! Try again later!");
								}
						}
					else
						{
						die("Nevaliden user/chat!");
						}
		}
	else if ( $action == 2 )
		{
			$q = $db->query("select (SELECT COUNT(`id`) FROM `conf` WHERE `id`='$chat' AND `owner`='$logged[id]') as broi,(SELECT COUNT(`user_id`) FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$user') as ima");
			$res = $q -> fetch_object();
			print_r($res);
				if ( $res->broi == 1 && $res->ima == 1 )
					{
					
					$a = $db->query("DELETE FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$user'");
						if ( $a )
							{
							header("Location: conf_chat.php?id=$chat");
							die("Uspeshno premahvane!");
							}
						else
							{
							die("System Error! Try again later!");
							}
					}
				else
					{
					die("Nevaliden user/chat!");
					}
		}
	else if ( $action == 3 )
		{
			$q = $db->query("select (SELECT COUNT(`id`) FROM `conf` WHERE `id`='$chat' AND `owner`='$logged[id]') as broi,(SELECT COUNT(`user_id`) FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$user') as ima");
			$res = $q -> fetch_object();
				if ( $res->broi == 1 && $res->ima == 1 )
					{
					$a = $db->query("DELETE FROM `conf_users` WHERE `chat_id`='$chat' AND `user_id`='$user'");
						if ( $a )
							{
							header("Location: conf_chat.php?id=$chat");
							die("Uspeshno premahvane!");
							}
						else
							{
							die("System Error! Try again later!");
							}
					}
				else
					{
					die("Nevaliden user/chat!");
					}
		}
	else
		{
		die("FAIL!");
		}
	
	}
else
	{
	//header("Location: index.php");
	print_r($_GET);
	die("Nevalidni danni!");
	}
?>