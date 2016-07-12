/* By Vikt0r */

function hide_lenta()
{
var lenta = document.getElementById("myinfo");
if ( lenta.style.display == 'none' )
{
lenta.style.display = 'block';
}
else
{
lenta.style.display = 'none';
}
}

var search = "";

function update_search()
{
search = document.getElementById("search_id").value;
users("");
}


function refresh()
{
users("");
setTimeout("refresh();",3000);
}


function chatWith(user)
{
user = 'chatwith.php?with=' + user;

if (! window.focus)return false;
window.open(user, "chat", 'height=400,width=550,left=100,top=100 scrollbars=no');
user.target="chat";
return true;

}

function openWindow(link)
{
window.open(link,"Chat ;)", "top=100,left=200,width=550,height=400,resizable=no,scrollbars=yes,menubar=no");
}

function changestat(text)
{
if ( text == 1 )
{
document.getElementById("status").src = 'images/status/naliniq.png';
}
else if ( text == 2 )
{
document.getElementById("status").src = 'images/status/otpochivasht.png';
}
else if ( text == 3 )
{
document.getElementById("status").src = 'images/status/otsustvasht.png';
}
else
{
document.getElementById("status").src = 'images/status/izvanliniq.png';
}
}

var users_request = false;
var http_request = false;

function users(text) 
{
newmsg();
var parameters = '';
  users_request = false;
  if (window.XMLHttpRequest) 
{
    users_request = new XMLHttpRequest();
    if (users_request.overrideMimeType) { users_request.overrideMimeType('text/html'); }
  } 
  else 
  if (window.ActiveXObject) 
  {
    try { users_request = new ActiveXObject("Msxml2.XMLHTTP"); } 
    catch (e) 
    {
      try { users_request = new ActiveXObject("Microsoft.XMLHTTP"); } 
      catch (e) {}
    }
  }
  url = 'users.php';
  url = url + '?status=' + text;
  users_request.onreadystatechange = usersContents;
  users_request.open('GET', url, true);
  users_request.setRequestHeader("Content-type", "text/html");
  users_request.setRequestHeader("Connection", "close");
  users_request.send(parameters);
}



function usersContents() 
{
if (users_request.readyState == 4 ) 
  {
    
      document.getElementById("users").innerHTML = users_request.responseText;
    
  }
}

function conf_refresh()
{
conf("");
setTimeout("conf_refresh();",3000);
}

var conf_request = false;

function conf(text) 
{

var parameters = '';
  conf_request = false;
  if (window.XMLHttpRequest) 
{
    conf_request = new XMLHttpRequest();
    if (conf_request.overrideMimeType) { conf_request.overrideMimeType('text/html'); }
  } 
  else 
  if (window.ActiveXObject) 
  {
    try { conf_request = new ActiveXObject("Msxml2.XMLHTTP"); } 
    catch (e) 
    {
      try { conf_request = new ActiveXObject("Microsoft.XMLHTTP"); } 
      catch (e) {}
    }
  }
  url = 'conf_index.php';
  url = url + '?text=' + text;
  conf_request.onreadystatechange = confContents;
  conf_request.open('GET', url, true);
  conf_request.setRequestHeader("Content-type", "text/html");
  conf_request.setRequestHeader("Connection", "close");
  conf_request.send(parameters);
}



function confContents() 
{
if (conf_request.readyState == 4 ) 
  {
    
      document.getElementById("cnf_chat").innerHTML = conf_request.responseText;
    
  }
}




var nastr_request = false;

function nastr(text) 
{
var parameters = '';
  nastr_request = false;
  if (window.XMLHttpRequest) 
{
    nastr_request = new XMLHttpRequest();
    if (nastr_request.overrideMimeType) { nastr_request.overrideMimeType('text/html'); }
  } 
  else 
  if (window.ActiveXObject) 
  {
    try { nastr_request = new ActiveXObject("Msxml2.XMLHTTP"); } 
    catch (e) 
    {
      try { nastr_request = new ActiveXObject("Microsoft.XMLHTTP"); } 
      catch (e) {}
    }
  }
  url = 'nastr.php';
  url = url + '?new=' + text;
  nastr_request.onreadystatechange = nastrContents;
  nastr_request.open('GET', url, true);
  nastr_request.setRequestHeader("Content-type", "text/html");
  nastr_request.setRequestHeader("Connection", "close");
  nastr_request.send(parameters);
}



function nastrContents() 
{
if (nastr_request.readyState == 4 ) 
  {
    
      document.getElementById("nastr").innerHTML = nastr_request.responseText;
    
  }
}

var username = '';

function setUser(user) { username = user; refreshchat(); }



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

var newmsg_request = false;

function newmsg() 
{
var parameters = '';
  newmsg_request = false;
  if (window.XMLHttpRequest) 
{
    newmsg_request = new XMLHttpRequest();
    if (newmsg_request.overrideMimeType) { newmsg_request.overrideMimeType('text/html'); }
  } 
  else 
  if (window.ActiveXObject) 
  {
    try { newmsg_request = new ActiveXObject("Msxml2.XMLHTTP"); } 
    catch (e) 
    {
      try { newmsg_request = new ActiveXObject("Microsoft.XMLHTTP"); } 
      catch (e) {}
    }
  }
  url = 'newmsg.php';
  newmsg_request.onreadystatechange = newmsgContents;
  newmsg_request.open('GET', url, true);
  newmsg_request.setRequestHeader("Content-type", "text/html");
  newmsg_request.setRequestHeader("Connection", "close");
  newmsg_request.send(parameters);
}



function newmsgContents() 
{
if (newmsg_request.readyState == 4 ) 
  {
    
      document.getElementById("newmsg").innerHTML = newmsg_request.responseText;
    
  }
}