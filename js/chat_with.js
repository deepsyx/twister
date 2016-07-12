

var username = '';
function setUser(user) { username = user; refreshchat(); }

function showup(i)
{
if ( i == 1 )
{
	var maskHeight = $(document).height();
	var maskWidth = $(window).width();
	$('#mask').css({'width':maskWidth,'height':maskHeight});
	
	$('#mask').fadeTo("slow",0.8); 
	var winH = $(window).height();
	var winW = $(window).width();
	$("#deisvie").css('top', winH/2-100);
	$("#deisvie").css('left', winW/2-225);
	$("#deisvie").fadeIn(1000);
}
}
	
$(document).ready(function(){
	$("#chps").click(function(){
		$("#rname_pole").slideDown();
	});

	$("#rnamen").click(function(){
		$("#rname_pole").slideUp();
	});
	
	
	$("#hide").click(function(){
	$("#deisvie").fadeOut(1000);
	$("#mask").fadeOut(1000);
	});
	
	
});






function refreshchat()
{
chat("",username);
setTimeout("refreshchat();",3000);
}

function chat(text,user) 
{
var parameters = '';
  http_request = false;
  if (window.XMLHttpRequest) 
{
    http_request = new XMLHttpRequest();
    if (http_request.overrideMimeType) { http_request.overrideMimeType('text/html'); }
  } 
  else 
  if (window.ActiveXObject) 
  {
    try { http_request = new ActiveXObject("Msxml2.XMLHTTP"); } 
    catch (e) 
    {
      try { http_request = new ActiveXObject("Microsoft.XMLHTTP"); } 
      catch (e) {}
    }
  }
  
  url = 'chatwithuser.php';
  url = url + '?user=' + user;
  
  
  if ( document.getElementById("main").innerHTML == '' )
  {
  url = url + '&begin=true';
  }
  
  text = encodeURI(text);
  
  url = url + '&text=' + text;
 
  http_request.onreadystatechange = alertContents;
  http_request.open('GET', url, true);
  http_request.setRequestHeader("Content-type", "text/html");
  http_request.setRequestHeader("Connection", "close");
  http_request.send(parameters);
}

var last = '';

function post()
{
text = document.getElementById("text").value;
if ( last != text )
{
chat(text,username);
document.getElementById("text").value = '';
}
}

function alertContents() 
{
if (http_request.readyState == 4 ) 
  {
    
      document.getElementById("main").innerHTML = document.getElementById("main").innerHTML + http_request.responseText;
    
  }
  document.getElementById("main").style.left = document.body.clientWidth + document.body.scrollLeft - 85;
  document.getElementById("main").scrollTop  = '10000';
}
