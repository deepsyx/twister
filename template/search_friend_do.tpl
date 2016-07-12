<strong> Търсене на абонати</strong><br />
Въведете всички сведения които знаете за абоната:
<form method="GET" action="#" onsubmit="return false;">
<table border="0">
<tr><td>Потребител:</td><td><input type="text" name="user" id="user_pole"></td></tr>

<tr><td></td><td><input type="submit" onClick="Do_friend_update();" name="btn" value="Търси"></td></tr>
</table>
</form><br />
<div class="overflo">


<center>
<!-- BEGIN show_users -->
<table style="border-collapse: collapse;">
<tr>
<td style="padding:0px; width: 270px;height: 22px; font-size: 9pt; background-repeat: no-repeat; background-image: url(images/blue_one.png); color: white;"> <a title="Потребителско име: {show_users.username}">{show_users.rname}</a></td>
<td style="padding:0px;"><a href="#" onClick='Friends_update("search_friend.php?do=add&usera={show_users.id}");'><img title="Добави {show_users.username} в вашият списък с приятели :)" src="images/dobavi_fr.png" style="border: 0px;"></a></td>
</tr>
</table>
<!-- END show_users --> 
</center>



</div>
<br /><center><a href="#" onClick="Zatvori();">Затвори</a></center><br />