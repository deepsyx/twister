<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister</title>
<style type="text/css">
@import "style.css";
</style>
<script type="text/javascript" src="js/jquery-1.4.3.js" type="text/javascript"></script>
</head>
<body>
<center>
<div class="lenta_chat">Хронология</div>
<div class="cavatar">
<a href="create_chat.php">Създай Нов Чат</a><br />
<div style="height: 250px; overflow-y: scroll; width: 450px;">
	<!-- BEGIN all_membs -->
	<table style="border-collapse: collapse; margin-top: 3px;">
	<tr>
<td style="padding:0px; width: 350px;height: 22px; font-size: 9pt; background-repeat: no-repeat; background-color: #3069BE; color: white;"> <a style="text-decoration: none;color: white;" href="conf_chat.php?id={all_membs.id}">{all_membs.title}</a></td>
</tr>
</table>
	<!-- END all_membs -->
</div>


</div>
</center>
</body>
</html>