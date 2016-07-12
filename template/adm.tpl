<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister</title>
<style type="text/css">
@import "adm.css";
</style>
<script type="text/javascript" src="js/jquery-1.4.3.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('#search').live('click', function(e) {
			var xa = $("#text").val();
			update("edituser.php?edit=" + xa);
		});
		
	$('#post').live('click', function(e) {
			var to = $("#to").val();
			var from = $("#from").val();
			update("viewmsgs.php?from=" + from + "&to=" + to);
		});

	$('#cc').live('click', function(e) {
			var rank = $("#rank").val();
			var ed = $("#ed").val();
			update("edituser.php?edit=" + ed + "&rank=" + rank);
			alert("Updated :)");
		});
		
	$('#checkban').live('click', function(e) {
			var bn = $("#bannedname").val();
			update("banhammer.php?user=" + bn);
		});
		
			$('#statusupdate').live('click', function(e) {
			var strike = $("#statusban").val();
			var bn = $("#bannedname").val();
			update("banhammer.php?strike=" + strike + "&user=" + bn);
			alert("Променено.");
		});
});	

function update(aa)
{
$.ajax(
			{
				url: aa,
				cache: false,
				success: function(message)
				{
					$("#cont").empty().append(message);
				}
			});
}
</script>
</head>
<body>
<Div class="main">

	<div class="left">
		<div class="menu"><a id="men" href="#" onClick="update('text.php');">Начало</a></div>
		<div class="menu"><a id="men" href="#" onClick="update('stat.php');">Статистика</a></div>
		<div class="menu"><a id="men" href="#" onClick="update('viewmsgs.php');">Съобщения</a></div>
		<div class="menu"><a href="#" id="men" onClick="update('edituser.php');">Потребители</a></div>
		<div class="menu"><a href="#" id="men" onClick="update('failedlogins.php');">Вписвания</a></div>
		<div class="menu"><a href="#" id="men" onClick="update('banhammer.php');">Блокиране</a></div>
	</div>

	<div class="center" id="cont">
	Добре дошли в админ панела.<br />
	Моля изберете опция от менуто в дясно :)
	</div>
	
<div style="clear:both;"></div>
</div>

</body>
</html>