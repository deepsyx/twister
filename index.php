<? require("config.php");
if ( $_SESSION['login'] != 1 )
	{
	header("Location: login.php");
	}
else
	{
	$dat = date("m-d");
	$rojdennici = $db->query("SELECT status,username,rname FROM users WHERE id IN ( SELECT CONCAT_WS(',',friend) FROM friends WHERE id = '$logged[id]' ) AND `born` LIKE '%-$dat'");
	
	if ( $rojdennici->num_rows == 0 )
		{
		$born_res = "Днес няма рожденници.";
		}
	else
		{
		$born_res = "Рожденници днес: <br />";
		while ( $row = $rojdennici -> fetch_object() )
			{
			$born_res .= "<strong><a href='#' class=\"abonati\" id=\"born_r\" title=\"$row->username\" onClick=\"nextuser='$row->username';\">$row->rname</a></strong><br />";
			}
		}
	
	$get_design = $db->query("SELECT * FROM `personalize` WHERE `id`='$logged[id]'");
	$design_info = $get_design -> fetch_object();
		
	$template->assign_vars(array(
		"bg" => $design_info->bg,
		"bg_fast" => $design_info->bg_fast,
		"text_fast" => $design_info->text_fast,
		"bg_users" => $design_info->bg_users,
		"text_users" => $design_info->text_users,
		"lenta" => $design_info->lenta,
		"events" => $design_info->events
	));

	
	$template->assign_vars(array(
	"avatar" => $logged['avatar'],
	"status_pic" => status2pic($_SESSION['user_status']),
	"username" => $logged['rname'],
	"nastroenie" => $logged['nastroenie'],
	"born_res" => $born_res
	));
	
	$template->pparse('index');
	}
//INSERT INTO `personalize` (`id`,`bg`,`bg_fast`,`text_fast`,`bg_users`,`text_users`,`lenta`,`events`) VALUES('','8cbeff','FFFFFF','000000','FFFFFF','000000','77a2d9','000000')
	?>