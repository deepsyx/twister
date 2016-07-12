<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{
	$q = $db->query("SELECT * FROM `failedlogin` ORDER BY `time` DESC LIMIT 30");
	echo '<table border="1"><tr><td>Потребител</td><td>Парола</td><td>IP</td><td>Време</td></tr>';
	while ( $row = $q -> fetch_object() )
	{
	$date = date("h:i d/m/y",$row->time);
	echo "<tr><td>$row->user</td><td>$row->test</td><td>$row->ip</td><td>$date</td></tr>";
	}
	echo '</table>';
}
?>
