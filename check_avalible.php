<?
require("config.php");

$get_user = clear($_GET['username']);

$golem = strlen($get_user);

if ( $golem < 6 )
	{
	echo 'Твърде късо.';
	}
else
	{
		$send = $db->query("SELECT COUNT(`id`) as `broi` FROM `users` WHERE `username`='$get_user'");
		$avalible = $send -> fetch_object();
		if ( $avalible->broi == 1 )
			{
			echo '<a style="color: red;">Името е заето.</a>';
			}
		else
			{
			echo '<a style="color: green;">Името е Свободно.</a>';
			}
	}
?>