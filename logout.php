<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
setcookie("user","", time()+60 );
setcookie("pass","", time()+60 );
$_SESSION['login'] = 0;
$_SESSION['catched'] = 0;
unset($_COOKIE[pass]);
unset($_COOKIE[user]);
header("Location: login.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />Вие успешно излязохте от системата.<a href="index.php">Начало</a>.';
?>