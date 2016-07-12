<?
require("config.php");

if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } else {
if ( $_GET['user'] && !empty($_GET['user']) )
	{
		$user = clear($_GET['user']);
		$broi_qq  = $db->query("SELECT COUNT(`id`) as `broi` FROM `users` WHERE `username`='$user'");
		$broi_q = $broi_qq -> fetch_object();

		if ( $broi_q->broi == 0 ) { die('Няма такъв юзър!'); } else {
	
					if ( $_GET['text'] )
						{
						$text = clear($_GET['text']);
						$time = time();
						$db->query("INSERT INTO `messages` (`text`,`from`,`to`,`time`) VALUES('$text','$logged[username]','$user','$time')");
						$date = date("H:i:s",$time);
						echo "<div style='clear: both;'><font color='#919191'>[$date]</font> <b>$logged[username]</b> : $text</div>";
						$showIt = true;
						}

					if ( $_GET['begin'] && $showIt != true )
						{
						$select = $db->query("select * from `messages` WHERE (( `to`='$user' AND `from`='$logged[username]' ) OR ( `to`='$logged[username]' AND `from`='$user')) ORDER BY `id` ASC LIMIT 15");
						}
					else
						{
						$select = $db->query("select * from `messages` WHERE ( `to`='$logged[username]' AND `from`='$user') AND `read`='0' AND id > ((SELECT MAX(id) from `messages`) - 10) ORDER BY `id` ASC");
						}

						while ( $row = $select->fetch_object() )
								{
								$date = @date("H:i:s",$row->time);
								if ( $row->text == '/sendfile' )
									{
									echo "<b><center>$row->from изпраща файл до участниците в чата!Натисни за да приемеш.</center></b><br />";
									}
								else
									{
									echo "<div><font color='#919191'>[$date]</font> <b>$row->from</b> : $row->text</div>";
									}
								} // nishto 
		}
	}
$db->query("UPDATE `messages` SET `read`='1' WHERE `to`='$logged[username]' AND `from`='$user'");
}
$db->close();
?>