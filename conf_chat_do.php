<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } 
	else
	{
	$id = $_POST['chat_id'];
		if ( is_numeric($id) )
			{
			$check_in = $db->query("SELECT COUNT(`chat_id`) as `check` FROM `conf_users` WHERE `chat_id`='$id' AND `user_id`='$logged[id]'");
			$result = $check_in -> fetch_object();
				if ( $result->check == 1 )
					{
					$post_text = clear($_POST['post_text']);
						if ( !empty($post_text) )
						{
						$time = time();
						$add_in = $db->query("INSERT INTO `conf_messages` (`from`,`text`,`time`,`chat_id`) VALUES('$logged[username]','$post_text','$time','$id')");
						}
					
					
						$all_chat = $db->query("SELECT * FROM ( SELECT * FROM `conf_messages` WHERE `chat_id`='$id' ORDER BY `id` DESC LIMIT 15 ) s ORDER BY `id` ASC ");
						while ( $row = $all_chat -> fetch_object() )
						{
						$view_time = date("H:i:s",$row->time);
							$template->assign_block_vars("users",array(
										"from" => $row->from,
										"text" => $row->text,
										"potre" => $user->rname,
										"time" => $view_time
										)); 
						}
						
				   $db->query("UPDATE `conf_users` SET `messages`=( SELECT COUNT(*) FROM `conf_messages` WHERE `chat_id`='$id' ) WHERE `chat_id`='$id' AND `user_id`='$logged[id]'");
					$template->pparse("cnf_msg");
					}
				else
				{
				die("Ne mojete da se prisuedinite kum tozi chat!");
				}
			}
		else
			{
			die("Nevalidno ID!");
			}
	}
?>