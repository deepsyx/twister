<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{

$to = clear($_GET['to']);
$from = clear($_GET['from']);

	if ( !empty($to) && !empty($from) )
		{
		$q = $db->query("SELECT * FROM `messages` WHERE (`to`='$to' AND `from`='$from') OR (`to`='$from' AND `from`='$to') ORDER BY `id` DESC");
		while ( $row = $q -> fetch_object() )
			{
				$template->assign_block_vars("show_users",array(
				"rname" => $row->from,
				"text" => $row->text
				));
			}
			$template -> pparse("PMS");
		}
	else
		{
		echo '<form action="#" onsubmit="return false;">От : <input type="text" name="from" id="from"><br />До : <input type="text" name="to" id="to"><br /><input type="submit" id="post" name="btn" value="Търси"></form>';
		}

}
?>