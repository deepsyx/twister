<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
else
{
$qaa = $db->query("SELECT COUNT(`id`) as `broi` FROM `messages` WHERE `read`='0' AND `to`='$logged[username]'");
$qz = $qaa->fetch_object();
$q_a = $db->query("SELECT *, (SELECT COUNT(*) FROM conf_messages WHERE conf_messages.chat_id=conf_users.chat_id) as msg FROM conf_users WHERE `user_id`='$logged[id]'");


$checkeda = 0;
	while ( $row = $q_a -> fetch_object() )
		{
			if ( $row->msg > $row->messages )
			{
		$checkeda = 1;
			$ids .= "$row->chat_id,";
			}
		}
		
if ( $qz->broi == 0 AND $checkeda==0  )
	{
	echo 'Нямате нови съобщения.';
	}
else
	{
	$array = array();
	echo 'Имате нови съобщения от : ';


	$q = $db->query("SELECT `from` FROM `messages` WHERE `read`='0' AND `to`='$logged[username]'");
	while ( $row = $q->fetch_object() )
		{

		if ( !in_array($row->from,$array) )
			{
			$array[] = $row->from;
			echo "<b><a href='#' class=\"abonati\" onClick='chatWith(\"$row->from\");'>$row->from</a></b> ,";
			}
		}
	}
	
	
	if ( $checkeda != 0 )
	{
		$ids = substr($ids, 0, -1);
		
		$q_chats = $db->query("SELECT `id`,`title` FROM `conf` WHERE id in ($ids)");
		while ( $row = $q_chats -> fetch_object() )
		{
		echo "<a class=\"abonati\" onClick='openWindow(\"conf_chat.php?id=$row->id\")' href='#'>$row->title</a> ,";
		}
	}
	
	
	
	}
$db->close();
?>