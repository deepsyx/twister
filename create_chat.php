<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } 
	else
	{
		if ( $_POST['btn']  )
			{
			if ( strlen ($_POST['title']) > 3 and !empty($_POST['title']) )
			{
	
			if ( !$_POST['users'] ) { die("Izberete potrebitel!"); }
			foreach ( $_POST['users'] as $value )
				{
			
					if ( is_numeric($value) )
						{
						$id_line .= "$value,";
						}
					else
					{
					die("Nevalidno ID na potrebitel!");
					}
				}
			
			$id_line = substr($id_line, 0, -1);
			
			$broi_users = $db->query("SELECT COUNT(`id`) as `users` FROM `users` WHERE `id` IN ($id_line)");
			$broi_result = $broi_users -> fetch_object();
			
			if ( $broi_result->users == count($_POST['users']) )
				{
				$title = clear($_POST['title']);
				$db->query("INSERT INTO `conf` (`owner`,`title`) VALUES('$logged[id]','$title')");
				
				$chat = $db->insert_id;
				
				$rowa = '';
				foreach ( $_POST['users'] as $row_a )
				{
				$rowa = $rowa."('$db->insert_id','$row_a'),";
				}
				
				$rowa = $rowa."('$db->insert_id','$logged[id]')";
				
				
				$db->query("INSERT INTO `conf_users` (`chat_id`,`user_id`) VALUES $rowa");
				
				header("Location: conf_chat.php?id=$chat");
			
			
				}
			else
				{
				die ('Nevalidno!');
				}
			}
			else
			{
			$template -> assign_vars(array("error"=>"Заглавието трябва да е по дълго от 3 символа.<a href='create_chat.php'>Върни се назад.</a>"));
$template -> pparse("error_page");			}
	
			}
		else
			{
				$user_qa = $db->query("SELECT id,username,rname FROM users WHERE id IN ( SELECT CONCAT_WS(',',friend) FROM friends WHERE id = '$logged[id]' ) ORDER BY `status` DESC");
				while ( $user = $user_qa->fetch_object() )
								{
									$template->assign_block_vars("users",array(
									"id" => $user->id,
									"username" => $user->username,
									"potre" => $user->rname
									)); 
								}

				$template -> pparse("conf_chat");
			}
	}
?>