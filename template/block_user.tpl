<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister | Block</title>
<style type="text/css">
@import "style.css";
</style>
</head>
<body><center>
<form action="?do=block" method="get">
<table border="0">
<tr><td>Блокирай:</td><td><input type="text" name="user"></td></tr>
<tr><td></td><td><input type="submit" value="Блокирай."><input type="hidden" name="do" value="block"></form></td></tr>
<tr><td><form action="?do=unblock" method="get">Деблокирай:</td><td><select name="user">
<!-- BEGIN show_block -->
<option value="{show_block.username}">{show_block.username}</option>
<!-- END show_block --> 
</select>
</td></tr>
<tr><td></td><td><input type="submit" value="Деблокирай."><input type="hidden" name="do" value="unblock"></form></td></tr>
</table>
</center>
</body>