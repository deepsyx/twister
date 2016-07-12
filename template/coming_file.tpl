<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Twister | Изпрати файл</title>
<style>
body,html 
	{
	background-color: #006fbd;
	}

.sf
	{
	color: #ffffff;
	font-family: Arial;
	}
	
.poluchavam
	{
	border: solid #000000 1px;
	width: 300px;
	}
</style>
</head>
<body>
<center>
<div style="background-color: #ffffff; width: 350px;">
<!-- BEGIN coming_file -->
<div class="poluchavam"><a href="dwnd.php?id={coming_file.id}">{coming_file.rfile} </a> <br /> От: {coming_file.izpratil}</div>
<!-- END coming_file -->
</div>
<br /><br />
{izprashtam}
<div style="background-color: #C0C0C0; width: 350px; padding: 10px;">
<!-- BEGIN success -->
<div class="poluchavam">{success.file} <br />  {success.status}</div><br />
<!-- END success -->
</div>
</center>
</body>