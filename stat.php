<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{
	$time = time();
	$user_q = $db->query("SELECT ( SELECT COUNT(`id`) from `users` ) as `broi`, (SELECT COUNT(`id`) FROM `messages` ) as `msg`,( SELECT COUNT(`time`) FROM `failedlogin`) as `failedlog`, ( SELECT COUNT(`id`) FROM `users` WHERE `online`>'$time' ) as `online");
	$user = $user_q -> fetch_object();
	echo "Потребители: $user->broi <br /> Съобщения: $user->msg <br /> Провалени вписвания: $user->failedlog <br /> Потребители онлайн : $user->online";
}
?>

