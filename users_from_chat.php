<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
else
{
$id = $_POST['id'];
	if ( is_numeric($id) )
	{
	$res = $db->query("SELECT COUNT(*) as `broi` FROM `conf_users` WHERE `chat_id`='$id' AND `user_id`='$logged[id]'");
	$q = $res -> fetch_object();
		if ( $q -> broi == 1 )
		{
		$q = $db->query("SELECT `owner`,`title` FROM `conf` WHERE `id`='$id'");
		$result_q = $q -> fetch_object();
		
		$get_users = $db->query("SELECT `username`,`nastroenie`,`avatar`,`id`,`rname` FROM `users` WHERE `id` IN (SELECT CONCAT_WS(',',user_id) FROM `conf_users` WHERE `chat_id`='$id')");
						
						while ( $row = $get_users -> fetch_object() )
						{
							if ( $result_q->owner == $logged[id] && $row->username != $logged[username] ) { $owner = '<a href="conf_function.php?action=2&chat='.$id.'&u='.$row->id.'"><img src="images/icon_x.png" style="width: 17px;height:17px;position: absolute; border: 0px;"></a>'; }
									$template->assign_block_vars("users",array(
										"id" => $row->id,
										"username" => $row->username,
										"rname" => $row->rname,
										"avatar" => $row->avatar,
										"rname" => $row->rname,
										"status" => status2pic($row->status),
										"owner" => $owner
									)); 
						}
		$template -> pparse("users_from_chat");
		}
	}
}
?>