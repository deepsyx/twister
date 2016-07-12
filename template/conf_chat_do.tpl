<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister | {chatname}</title>
<script src="js/jquery-1.4.3.js" type="text/javascript"></script>
<script src="js/chat_conf.js" type="text/javascript"></script>
<script src="js/slider_test.js" type="text/javascript"></script>
<style type="text/css">
@import "style.css";
	.show_all_joined { float: left; margin-left: 5px;  }
	
	#content-slider {
      width: 360px;
      height: 6px;
      background: #BBBBBB;
      position: relative;
    }

    .ui-slider-handle {
      width: 8px;
      height: 8px;
      position: absolute;
      top: -2px;
      background: #478AFF;
    }

    #content-scroll {
      width: 370px;
      height: 70px;
     
      overflow: hidden;
    }

    #content-holder {
      width: 400px;
      height: 270px;
    }

    .content-item {
      width: 65px;
      height: 270px;
      padding: 5px;
      float: left;
  }
</style>
</head>
<body onLoad="SetChat({chatid});refresh_it();">
<center>
<div class="lenta_chat">{chatname}</div>
	<div class="myinfo_chat">
		<table border="0" style="padding: 5px;">
		<tr>
<td style="width: 375px; ">

<div id="content-scroll">
<div id="content-holder">

Зареждане...

</div>
</div>
<div id="content-slider"></div>


</td>
<td style="width: 150px; height: 73px;">
<div id="getinfo_pole" style="font-size: 9pt; height: 70px; top: -4px; background-color: white;"></div>
</td>
		</tr>
		</table>
	</div>
<div style="background-color: white; width: 540px; margin-top: 5px; margin-bottom: 5px; overflow-y: scroll; height: 230px;" id="main"></div>
<div style="background-color: white; width: 540px; height: 28px;">
<form onsubmit="return false;" action="#">
<input type="text" AUTOCOMPLETE="OFF" style="width: 93%; border: 0px;" name="text" id="text">
<input type="submit" name="btn" onClick='post();' style="background-image: url(images/chat.png); border: 0px; width: 25px; height: 25px;" value=" ">
</form>
</div>
<a href="#" onClick="showup();">Добави абонати към чата</a>
<div id="mask"></div> 
<div id="deisvie">
	Моля изберете абонатът който искате да добавите от менуто по-долу:<br />
	<form action="conf_function.php?action=1&chat=7" method="get">
	<input type="hidden" value="1" name="action"><input type="hidden" name="chat" value="{chatid}">
	<select name="u">
	<!-- BEGIN all_membs -->
	<option value="{all_membs.id}">{all_membs.username}</option>
	<!-- END all_membs -->
	</select>
	<input type="submit" value="Добави"></form> <input type="button" value="Затвори" id="hide">
	
</div>
</center>
</body>
</html>