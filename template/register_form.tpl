<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister | Регистрация</title>
<style type="text/css">
@import "style.css";

html, body
{
font-family: Tahoma, Nimbus Sans L, sans-serif;
font-size: 12px;
}

.gen_img
{
 
margin-top: 0px; 
margin-left: 4px; 
height: 21px; 
width: 100px; 
position: absolute;
}

.zdv { color: #ff0000; }
input[type=text] {
width: 200px;
} 
input[type=password] {
width: 200px;
} 
</style>
<script src="js/jquery-1.4.3.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	$('#user').keyup(function(){
	$('#pass_check').empty();
	var users = $("#user").val();
		$.ajax(
		{
			url: "check_avalible.php?username=" + users,
			cache: false,
			success: function(message)
			{
				$("#user_check").empty().append(message);
			}
		});
	});

	$('#pass').keyup(function(){
	$('#user_check').empty();

		if ( $('#pass').val().length > 5 )
		{
			$("#pass_check").empty().append("Ok.");
		}
		else
		{
			$("#pass_check").empty().append("Твърде къса.");
		}
	});

	$("#termbutton").click(function() {
	$("#term").toggle();
	});
	
	$("#email").keyup(function() {
	$('#user_check').empty();
	$('#pass_check').empty();
	});
	
	$("#sug").change(function() {
	$('#buttona').attr('disabled', false);
	});
	
	$("#generate").click(function() {
	var Anti_image_catche = Math.floor(Math.random()*9999)
	$("#new_gene").empty().append('<img class="gen_img" src="valid_image.php?new' + Anti_image_catche + '" alt="Въведете кода от картиката в полето отдясно :)" />');
	});
	
});
</script>
</head>
<body>

<div class="loginpole">
<center>
		<a style="color: {color}">{error}</a><br />
	<br /><form action="" method="post">
	<table border="0">
	<tr><td valign="top">Потребителско име:<a class="zdv">*</a></td><td> 	
			<input type="text" id="user" name="username" /><br /><div id="user_check"></div></td></tr>
	<tr><td valign="top">Парола:<a class="zdv">*</a></td><td><input type="password" id="pass" name="psw" /><br /><div id="pass_check"></div></td></tr>
	<tr><td valign="top">Потвърди паролата:<a class="zdv">*</a></td><td><input type="password" id="pass_c" name="psw_c" /></td></tr>
	<tr><td valign="top">E-mail:<a class="zdv">*</a></td><td><input type="text" id="email" name="mail" /></td></tr>
	<tr><td valign="top">Въведете кода:<a class="zdv">*</a> 
		<a id="generate" href="#"><img style="border: 0px;" src="images/refresh.png" alt="Натисни за презареждане на картинката." /></a>
	</td><td valign="middle"><input maxlength="5" type="text" name="code" style="width: 95px;" />
		<a id="new_gene">
		<img class="gen_img" id="capcha_code" src="valid_image.php" alt="Въведете кода от картиката в полето отдясно :)" />
		</a>
	</td></tr>
	<tr><td></td><td></td></tr>
	
	<tr><td valign="top"></td><td> </td></tr>
	<tr><td valign="top">Псевдоним:</td><td><input type="text" id="rname" name="rname" /></td></tr>
	<tr><td valign="top">Дата на раждане:</td><td>
	<select class="form1" name="born_day">
	<option value="0"></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>

<select class="form1" name="born_month">
	<option value="0"></option>
	<option value="1">Януари</option>
	<option value="2">Февруари</option>
	<option value="3">Март</option>
	<option value="4">Април</option>
	<option value="5">Май</option>
	<option value="6">Юни</option>
	<option value="7">Юли</option>
	<option value="8">Август</option>
	<option value="9">Септември</option>
	<option value="10">Октомври</option>
	<option value="11">Ноември</option>
	<option value="12">Декември</option>
</select>
<select class="form1" name="born_year"><option value="0"></option>
						<option value="1997">1997</option>
						<option value="1996">1996</option>
						<option value="1995">1995</option>
						<option value="1994">1994</option>
						<option value="1993">1993</option>
						<option value="1992">1992</option>
						<option value="1991">1991</option>
						<option value="1990">1990</option>
						<option value="1989">1989</option>
						<option value="1988">1988</option>
						<option value="1987">1987</option>
						<option value="1986">1986</option>
						<option value="1985">1985</option>
						<option value="1984">1984</option>
						<option value="1983">1983</option>
						<option value="1982">1982</option>
						<option value="1981">1981</option>
						<option value="1980">1980</option>
						<option value="1979">1979</option>
						<option value="1978">1978</option>
						<option value="1977">1977</option>
						<option value="1976">1976</option>
						<option value="1975">1975</option>
						<option value="1974">1974</option>
						<option value="1973">1973</option>
						<option value="1972">1972</option>
						<option value="1971">1971</option>
						<option value="1970">1970</option>
						<option value="1969">1969</option>
						<option value="1968">1968</option>
						<option value="1967">1967</option>
						<option value="1966">1966</option>
						<option value="1965">1965</option>
						<option value="1964">1964</option>
						<option value="1963">1963</option>
						<option value="1962">1962</option>
						<option value="1961">1961</option>
						<option value="1960">1960</option>
						<option value="1959">1959</option>
						<option value="1958">1958</option>
						<option value="1957">1957</option>
						<option value="1956">1956</option>
						<option value="1955">1955</option>
						<option value="1954">1954</option>
						<option value="1953">1953</option>
						<option value="1952">1952</option>
						<option value="1951">1951</option>
						<option value="1950">1950</option>
						<option value="1949">1949</option>
						<option value="1948">1948</option>
						<option value="1947">1947</option>
						<option value="1946">1946</option>
						<option value="1945">1945</option>
						<option value="1944">1944</option>
						<option value="1943">1943</option>
						<option value="1942">1942</option>
						<option value="1941">1941</option>
						<option value="1940">1940</option>
						<option value="1939">1939</option>
						<option value="1938">1938</option>
						<option value="1937">1937</option>
						<option value="1936">1936</option>
						<option value="1935">1935</option>
						<option value="1934">1934</option>
						<option value="1933">1933</option>
						<option value="1932">1932</option>
						<option value="1931">1931</option>
						<option value="1930">1930</option>
</select>
</td></tr>
	
	</table>
	<div><input type="checkbox" name="okey" id="sug" value="k" /> Съгласен/а съм с <a href="#" id="termbutton">условията!</a></div>
	<div id="term" style="width: 450px; display: none; background-color: #D3D3D3;">
	При неприемане на тези условия, моля не ползвайте този уеб сайт.<br />
	Вие нямате право да:<br />
	- Нагрубявате другите потребители по всякакъв начин;<br />
	- Нарушаване цялостта/съдържанието на сайта.<br />
	- Изпращате нежелани съобщения до всички потребител.<br />
	</div>
	<div><input type="submit" disabled="disabled" id="buttona" name="btn" value="Регистрация!" /><br /><a class="zdv">*</a> Полетата са задължителни!</div>
	</form><br />
	
	<div style="background-color: #e4f5fc; width: 300px; border: solid #cdd7db 1px; margin-bottom: 10px;">
		<a href="login.php" style="color: black;">Вече сте регистрирали акаунт? Влезте с него.</a>
	</div>
</center>	
</div>


</body>
</html>