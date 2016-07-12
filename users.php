<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } 
else
{
	if ( is_numeric($_GET['status']) && $_GET['status'] > -1 && $_GET['status'] < 4 )
		{
		$db->query("UPDATE `users` SET `status`='$_GET[status]' WHERE `username`='$logged[username]'");
		$_SESSION['user_status'] = $_GET['status'];
		}

			$user_qa = $db->query("SELECT status,username,nastroenie,rname FROM users WHERE id IN ( SELECT CONCAT_WS(',',friend) FROM friends WHERE id = '$logged[id]' ) ORDER BY `status` DESC");
					while ( $user = $user_qa->fetch_object() )
					{
					$pic = status2pic($user->status);
						$template->assign_block_vars("users",array(
						"pic" => $pic,
						"username" => $user->username,
						"nastroenie" => $user->nastroenie,
						"potre" => $user->rname
						)); 
					}
			$template -> pparse("users");

	$new = time() + 7;
	$time = time();
	
	$db->query("UPDATE `users` SET `online`='$new' WHERE `id`='$logged[id]';");
	$db->query("UPDATE `users` SET `status`='0' WHERE `online`<'$time'");	
	$_SESSION['uinfo']['online'] = $new;
	// <a href="#" onClick="Zatvori();">???????</a>
}
$db->close();
//SELECT * FROM `friends` WHERE `friend` in ( SELECT `id` FROM `users` WHERE `username` in (SELECT CONCAT_WS(',',`from`) FROM messages WHERE `read`='0' AND `to`='demouser') ) 
?>