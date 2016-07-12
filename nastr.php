<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
else
{
$nastr = clear($_GET['new']);
	if ( !$_GET['nastr'] )
	{
		if ( strlen($nastr) > 150 ) $to4ki = '...';
		$nastr = substr($nastr,0,150);
		$nastr = $nastr.$to4ki;
		$db->query("UPDATE `users` SET `nastroenie`='$nastr' WHERE `id`='$logged[id]'");
		$_SESSION['uinfo']['nastroenie'] = $nastr;
		
	}
	else
	{
		if ( strlen($nastr) > 3 )
			{
			$db->query("UPDATE `users` SET `rname`='$nastr' WHERE `id`='$logged[id]'");
			$_SESSION['uinfo']['rname'] = $nastr;
			}
	}

}
$db->close();

	
?>