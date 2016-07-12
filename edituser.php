<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{
	$user = clear($_GET['edit']);
	$do = clear($_GET['do']);
	$rank = clear($_GET['rank']);
	$template -> pparse("SU");
 
	if ( $rank ) 
	{
		$a = $db->query("UPDATE `users` SET `admin`='$rank' WHERE `username`='$user'");
	}
	
	if ( $do == "delete" )
	{
	$a = $db->query("DELETE FROM `users` WHERE `username`='$user'");
	
		if ( $a ) 
			{
			echo 'Изтрито';
			}
		else
			{
			echo 'Грещка.';
			}
	}
	

	if ( !empty($user) )
	{
		$q = $db->query("SELECT * FROM `users` WHERE `username`='$user'");
		$row = $q -> fetch_object();
		//print_r($row);
		$regdate = date("d/m/y",$row->regdate);
		$lastonline = date("h:i d/m/y",$row->online);
		$status = status2pic($row->status);
		$admin = ( $row->admin == 0 ) ? "Потребител" : "Администратор";
		echo "
		<table border='0'>
		<tr><td>Потребителско име:</td><td><input type='text' value='$row->username' id='ed' disabled='disabled'></td></tr>
		<tr><td>Регистриран на:</td><td>$regdate</td></tr>
		<tr><td>Статус:</td><td>$status</td></tr>
		<tr><td>Последно онлайн:</td><td>$lastonline</td></tr>
		<tr><td>Псевдоним:</td><td>$row->rname</td></tr>
		<tr><td>Роден на:</td><td>$row->born</td></tr>
		<tr><td>Ранк:</td><td>$admin</td></tr>
		</table><br /><hr>
		Ранк: <select id=\"rank\"><option value=\"1\">Потребител</option><option value=\"2\">Администратор</option></select> <input type=\"button\" id=\"cc\" value=\"Промени\">
		<input type=\"button\" onClick=\"update('edituser.php?edit=$row->username&do=delete');\" value=\"Изтрии\">
		";
	}
}
?>