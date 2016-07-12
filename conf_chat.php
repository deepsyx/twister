<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } 
	else
	{
	$id = $_GET['id'];
		if ( is_numeric($id) )
			{
			$check_in = $db->query("SELECT COUNT(`chat_id`) as `check` FROM `conf_users` WHERE `chat_id`='$id' AND `user_id`='$logged[id]'");
			$result = $check_in -> fetch_object();
				if ( $result->check == 1 )
					{
					############################################################################
					$q = $db->query("SELECT `owner`,`title` FROM `conf` WHERE `id`='$id'");
					$result_q = $q -> fetch_object();
					$template -> assign_vars(array("chatname"=>$result_q->title , "chatid"=>$id));
					
					############################################################################
					
			
					
					$get_users = $db->query("SELECT id,username FROM users WHERE id IN ( SELECT CONCAT_WS(',',friend) FROM friends WHERE id = '$logged[id]' ) AND id NOT IN ( SELECT CONCAT_WS(',',user_id) FROM conf_users WHERE chat_id = '$id' ) ORDER BY `status` DESC");
					
					while ( $row = $get_users -> fetch_object() )
					{
								$template->assign_block_vars("all_membs",array(
									"id" => $row->id,
									"username" => $row->username
								)); 
					}

					
					############################################################################
					$template -> pparse("ccd");
					}
				else
				{
				echo 'Ne mojete da se prisuedinite kum tozi chat!';
				}
			}
		else
			{
			die("Nevalidno ID!");
			}
	}
?>