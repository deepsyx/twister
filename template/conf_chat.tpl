<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister</title>
<style type="text/css">
@import "style.css";
</style>
<script type="text/javascript" src="js/jquery-1.4.3.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
  $(".low input[type='button']").click(function(){
    var arr = $(this).attr("name").split("2");
    var from = arr[0];
    var to = arr[1];
  
  $("#" + from + " option:selected").each(function(){
      $("#" + to).append($(this).clone());
      $(this).remove();
    });
	
  });
});

function selectAll() {
var box = document.getElementById("right");
     for(var i=0; i<box.length; i++) {
     box[i].selected = true;
     }
}


</script>
</head>
<body>
<center>
<div class="lenta_chat">Създай конферентен чат</div>
<div class="cavatar"><br />
<form action="" method="post" name="mform">
Заглавие на чата:<br /> <input type="text" name="title" style="width: 410px;">
<br />Абонати: <br />
<table border="0">
	<tr>
		<td>
			<select id="left" size="10" class="multiple_s">
			
<!-- BEGIN users -->
<option value="{users.id}">{users.username}</option>
<!-- END users -->

			</select>
		</td>
		<td>
		  <div class="low container">
			<input name="left2right" value="Добави" type="button" style="width: 100px;"><br />
			<input name="right2left" value="Премахни" type="button" style="width: 100px;">
		  </div>
		</td>
		<td>
		   <select name="users[]" id="right" size="10" class="multiple_s" multiple="multiple">
	
		   </select>
		</td>
	</tr>
	<tr><td></td><td></td><td><input type="submit" name="btn" value="Започни" style="width: 150px;" onClick="selectAll();"></td></tr>
	</table>
</form>
</div>
</center>
</body>
</html>