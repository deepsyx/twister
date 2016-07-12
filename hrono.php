<?
require("config.php");

$q = $db->query("SELECT * FROM `conf` WHERE `id` IN ( SELECT CONCAT_WS(',',chat_id) FROM `conf_users` WHERE `user_id`='$logged[id]' ) ORDER BY `id` DESC");
while ( $row = $q -> fetch_object() )
{
									$template->assign_block_vars("all_membs",array(
									"id" => $row->id,
									"title" => $row->title
									)); 
}

$template->pparse("hrono");
?>