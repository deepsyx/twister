<?
oB_start();
session_start();

include("functions.php");
include('lib/template.php');
$db = new Mysqli("localhost", "root", "vertrigo", "skype");



if ( $_SESSION['catched'] != 1 && $_SESSION['login'] == 1 )
	{
		$user_c = $_SESSION['uname'];
		$pass_c = $_SESSION['upass'];
		$logged_q = $db->query("SELECT * FROM `users` WHERE `username`='$user_c' AND `password`='$pass_c'");
		$logged = $logged_q->fetch_assoc();
		
			$_SESSION['uinfo'] = $logged;
			$_SESSION['catched'] = 1;
			$_SESSION['user_status'] = 2;
			$db->query("UPDATE `users` SET `status`='2' WHERE `id`='$logged[id]'");
	
	}
else
	{
	$logged = $_SESSION['uinfo'];
	}

$template = new Templata('template');

$template->set_filenames(array(
"index" => "index.tpl",
"chatwith" => "chatwith.tpl",
"register" => "register_form.tpl",
"login" => "login.tpl",
"avatar" => "upload_avatar.tpl",
"SF_main" => "search_friend_main.tpl",
"SF_do" => "search_friend_do.tpl",
"block_user" => "block_user.tpl",
"error_page" => "show_it.tpl",
"send_file" => "send_file.tpl",
"coming_file" => "coming_file.tpl",
"see_it" => "see_it.tpl",
"users" => "all_users.tpl",
"files" => "coming_go.tpl",
"check_user" => "chech_user.tpl",
"SU" => "search_user.tpl",
"adm" => "adm.tpl",
"PMS" => "print_msgs.tpl",
"banhammer" => "banhammer.tpl",
"bhs" => "banhammer_strikes.tpl",
"conf_chat" => "conf_chat.tpl",
"ccd" => "conf_chat_do.tpl",
"cnf_msg" => "conf_chat_msg.tpl",
"users_from_chat" => "ufc.tpl",
"create_back" => "create_back.tpl",
"hrono" => "hronologiq.tpl"
));

//print_r($_SESSION['uinfo']);


?>