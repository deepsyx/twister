<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } 
else
{
$bg = trim($_POST['bg']);
$fast_bg = trim($_POST['fast_bg']);
$fast_txt = trim($_POST['fast_txt']);
$user_bg = trim($_POST['user_bg']);
$user_txt = trim($_POST['user_txt']);
$lenta = trim($_POST['lenta']);
$event = trim($_POST['event']);

if ( $_GET['default'] ) 
{ 
	$db->query("UPDATE `personalize` SET `bg`='91C1FF', `bg_fast`='ffffff', `text_fast`='000000', `bg_users`='FFFAF5', `text_users`='000000', `lenta`='77a2d9',`events`='000000' WHERE `id`='$logged[id]'");
}

if ( preg_match("/^[a-fA-F0-9]+$/", $bg) == 1 && preg_match("/^[a-fA-F0-9]+$/", $fast_bg) == 1 &&  preg_match("/^[a-fA-F0-9]+$/", $fast_txt) == 1 && 
 preg_match("/^[a-fA-F0-9]+$/", $user_bg) == 1 &&  preg_match("/^[a-fA-F0-9]+$/", $user_txt) == 1 &&  preg_match("/^[a-fA-F0-9]+$/", $lenta) == 1 && 
 preg_match("/^[a-fA-F0-9]+$/", $event) == 1 )
	{

	$db->query("UPDATE `personalize` SET `bg`='$bg', `bg_fast`='$fast_bg', `text_fast`='$fast_txt', `bg_users`='$user_bg', `text_users`='$user_txt', `lenta`='$lenta',`events`='$event' WHERE `id`='$logged[id]'");
	echo 'Okay :)';
	}
	else
	{
	echo 'INVALID!';
	}
}

//id`,`bg`,`bg_fast`,`text_fast`,`bg_users`,`text_users`,`lenta`,`events`
?>