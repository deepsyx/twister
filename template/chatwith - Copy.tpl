<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister | Чат с {chatwith}</title>
<script src="js/jquery-1.4.3.js" type="text/javascript"></script>
<script src="js/chat_with.js" type="text/javascript"></script>
<style type="text/css">
@import "style.css";
</style>
</head>
<body onLoad='setUser("{chatwith}"); showup({add_ex});'>
<center>
<div class="lenta_chat"><img src='images/status/{status_pic}'> {rname} <a style="aligh: right;"></a></div>
<div class="myinfo_chat"><table border="0" class="lenta_info">
<tr><td><img style="border: 0px;" width="73" height="73" src="{avatar}"></td><td width="500"><div style="padding: 5px; background-color: white; height: 40px;">{nastroenie}</div>
<div style="padding: 3px;">
<a style="text-decoration:none; float: right;" href="{linka}{user_id}"><img style="border: 0px;" src="images/{button_add}.png"></a> 
<a style="text-decoration:none; float: right;" href="block.php?user={chatwith}&do=block"><img style="border: 0px;" src="images/blokirai_button.png"></a>
</div><br />
</td></tr>
</table></div>
<div style="background-color: white; width: 540px; margin-top: 5px; margin-bottom: 5px; overflow-y: scroll; height: 230px;" id="mainaad">
</div>
<div style="clear: both;"></div>
<div style="background-color: white; width: 540px; height: 28px;">
<form onsubmit="post(); return false;" action="#">
<input type="text" AUTOCOMPLETE="OFF" style="width: 93%; border: 0px;" name="text" id="text">
<input type="hidden" name="with" value="{chatwith}">
<input type="submit" name="btn" onClick='post();' style="background-image: url(images/chat.png); border: 0px; width: 25px; height: 25px;" value=" ">
</form>
</div>
</center>
<div id="mask"></div> 
<div id="deisvie">
	<table border="0">
	<tr><td><img style="border: 0px;" width="100" height="100" src="{avatar}"></td><td width="300px">
	{rname} не е във вашият списък с абонати.Какво действие ще предприемете?<br />
	<input type="button" value="Блокирай" onClick="document.location='block.php?user={chatwith}&do=block';"> <input type="button" value="Подмини" id="hide"> 
	<input type="button" value="Добави" onClick="document.location='search_friend.php?do=add&usera={user_id}';">
	</td></tr>
	</table>
</div>

</body>
</html>