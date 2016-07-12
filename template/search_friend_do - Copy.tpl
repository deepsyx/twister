<strong> Търсене на абонати</strong><br />
Въведете всички сведения които знаете за абоната:
<form method="GET" action="#" onsubmit="return false;">
<table border="0">
<tr><td>Потребител:</td><td><input type="text" name="user" id="user_pole"></td></tr>

<tr><td></td><td><input type="submit" onClick="Do_friend_update();" name="btn" value="Търси"></td></tr>
</table>
</form><br />
<div class="overflo">
<table border="1">
<tr><td width="200">Псевдоним</td><td>Потребител</td><td>Добави</td></tr>



<!-- BEGIN show_users -->
<tr><td>{show_users.rname}</td><td>{show_users.username}</td><td>
<a href="#" onClick='Friends_update("search_friend.php?do=add&usera={show_users.id}");'>+</a>
</td></tr>
<!-- END show_users --> 

</table>

<table style="border-collapse: collapse;">
<tr><td style="padding:0px; width: 250px;height: 20px;background-image: url(images/blue_one.png); color: white;"> asdasdasdasdsd</td><td style="padding:0px;"><a href="#"><img src="images/dobavi_fr.png" style="border: 0px;"></a></td></tr>
</table>

</div>
<br /><center><a href="#" onClick="Zatvori();">Затвори</a></center><br />