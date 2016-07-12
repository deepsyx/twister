<?
require("config.php");

$q = $db->query("SELECT *, (SELECT COUNT(*) FROM conf_messages WHERE conf_messages.chat_id=conf_users.chat_id) as msg FROM conf_users WHERE `user_id`='1'");

while ( $row = $q -> fetch_object() )
{

	print_r($row); echo '<br />';

}


?>