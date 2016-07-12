<?
require("config.php");
if ( $_SESSION['uinfo']['admin'] == 2 )
{
$template -> pparse("adm");
}
else
{
echo 'Nqmate dostap do tazi stranica! Molq lognete se kato administrator';
}
?>