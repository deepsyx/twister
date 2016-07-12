<?
include("config.php");

$select = $db->query("SELECT username,rname FROM users WHERE id IN ( SELECT CONCAT_WS(',',friend) FROM friends WHERE id = '$logged[id]' ) AND `status`!=0 ORDER BY `status` DESC");
while ( $row = $select -> fetch_assoc() )
{
	$template->assign_block_vars("coming_file",array(
						"rname" => $row['rname'],
						"name" => $row['username']
						));
}


$template -> pparse("files");
?>