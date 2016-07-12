<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); exit; }
	else
	{
		if ( $_GET['user'] )
		{
		$user = clear($_GET['user']);

		$result_b = $db->query("SELECT COUNT(`id`) as `broi` FROM `users` WHERE `username`='$user'");
		$result = $result_b -> fetch_object();

		if ( $result->broi == 1 )
		{

			if ( $_GET['do'] == 'unblock' )
				{
						$is_blocked_c = $db->query("SELECT COUNT(*) as `broi` FROM `blocked` WHERE `user`='$logged[username]' AND `blockiran`='$user'");
						$is_blocked = $is_blocked_c -> fetch_object();
						
							if ( $is_blocked->broi == 0 )
								{
								$template->assign_vars(array("error" => 'Абонатът не е блокиран!'));
					
								}
						else
								{
								$unblock = $db->query("DELETE FROM `blocked` WHERE `user`='$logged[username]' AND `blockiran`='$user'");
									if ( $unblock )
										{
										$template->assign_vars(array("error" => 'Абонатът е деблокиран успешно.'));
										}
									else
										{
										$template->assign_vars(array("error" => 'Грешка!'));
										}
								}
				}
			else
				{
					$is_blocked_c = $db->query("SELECT COUNT(*) as `broi` FROM `blocked` WHERE `user`='$logged[username]' AND `blockiran`='$user'");
					$is_blocked = $is_blocked_c -> fetch_object();
					
						if ( $is_blocked->broi == 0 )
								{

										$do_block = $db->query("INSERT INTO `blocked` (`user`,`blockiran`) VALUES('$logged[username]','$user')");
									if ( $do_block )
										{
										$template->assign_vars(array("error" => 'Потребителят е блокиран успешно.'));
										}
									else
										{
										$template->assign_vars(array("error" => 'Грешка при блокиране!'));
										}
								}
						else
								{
								$template->assign_vars(array("error" => 'Потребителят не съществува.'));
								}
				}
		}
		else
				{
				$template->assign_vars(array("error" => 'Потребителят не съществува.'));
				}
		$template -> pparse("error_page");
		}
		else
		{
			$cq = $db->query("SELECT `blockiran` FROM `blocked` WHERE `user`='$logged[username]'");
				while ( $row = $cq->fetch_object() )
					{
						$template->assign_block_vars("show_block",array("username" => $row->blockiran));
					}
					$template -> pparse("block_user");
		}
	}
$db->close();
?>
