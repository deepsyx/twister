<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{
$user = clear($_GET['user']);
	if ( !empty($user) )
	{
	
	$strike = $_GET['strike'];
	if ( $strike == 0 || $strike == 1 )
	{
	$db->query("UPDATE `users` SET `banned`='$strike' WHERE `username`='$user'");
	} 
	
	$q = $db->query("SELECT `banned` FROM `users` WHERE `username`='$user'");
	$row = $q->fetch_object();
	
	if ( $row->banned == 0 ) { $bt = "Позволен достъп"; } else { $bt = "Забранен достъп"; }
	
	$template->assign_vars(array("result"=>$bt,"user"=>$user));
	$template -> pparse("bhs");
	}
	else
	{
	$template -> pparse("banhammer");
	}
	
}
else
{
header("Location: login.php");
}
?>