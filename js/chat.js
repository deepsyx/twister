$(document).ready(function(){
$("#rname_pole").hide();


var next_user;

if ( $("#nastro").val().length == 0 ) 
	{
		$("#nastro").empty().append("Натиснете тук за промените текста.");
	}
	
	$("#send_f").click(function() {
	$("#draggable").draggable();
	$("#draggable").show();
	});



	$('#status_now').click(function() {
	if ($("#select_status").is(":hidden")){
		$("#select_status").slideDown("slow");
		}
		else
		{
		$("#select_status").slideUp("slow");
		}
	});

	$('#select_status img').click(function(){
		$("#select_status").slideUp("slow");
	});

	$('#modal').click(function(e) {
		e.preventDefault();
		
		Friends_update("search_friend.php");
		var winH = $(window).height();
		var winW = $(window).width();
		$("#dialog1").css('top', winH/2-100);
		$("#dialog1").css('left', winW/2-225);
		$("#dialog1").fadeIn(1000);
	});
	
	
	
	$('#mod_c').click(function(e) {
			e.preventDefault();
		var winH = $(window).height();
		var winW = $(window).width();
		$("#modify").css('top', winH/2-100);
		$("#modify").css('left', winW/2-225);
		$("#modify").fadeIn(1000);
	});
	
	$('#mod_u').click(function(e) {
		e.preventDefault();
		var winH = $(window).height();
		var winW = $(window).width();
		$("#user_mod_info").css('top', winH/2-100);
		$("#user_mod_info").css('left', winW/2-225);
		$("#user_mod_info").fadeIn(1000);
	});
	
	$('#close_sp').live('click', function(e) {
	$("#dialog1").fadeOut(1000);
	});
	
	$('#close_changes').click(function() {
	$("#user_mod_info").fadeOut(1000);
	});
	
	$('#close_mod').click(function() {
	$("#modify").fadeOut(1000);
	});

	$("#color_bg").change(function() {
	var bg_color = $("#color_bg").val();
 	$("body").css("background-color","#" + bg_color);
	});
	
	$("#color_opt").change(function() {
	var opt_color = $("#color_opt").val();
	$("#myinfo").css("background-color","#" + opt_color);
	});
	
	$("#color_text").change(function() {
	var text_color = $("#color_text").val();
	$("#newmsg").css("color","#" + text_color);
	});
	
	$("#color_pole").change(function() {
	var pole_color = $("#color_pole").val();
	$("#users").css("background-color","#" + pole_color);
	});
	
	$("#color_pole_txt").change(function() {
	var pole_color_txt = $("#color_pole_txt").val();
	$("#users").css("color","#" + pole_color_txt);
	});
	
	$("#color_fast").change(function() {
	var fast_color = $("#color_fast").val();
	$("#indi").css("background-color","#" + fast_color);
	});
	
	$("#color_fast_txt").change(function() {
	var fast_color_txt = $("#color_fast_txt").val();
	$("#indi").css("color","#" + fast_color_txt);
	});

	$("#test_mod").click(function() {
		var eq_bg = $("#color_bg").val();
		var eq_fast_bg = $("#color_fast").val();
		var eq_fast_txt = $("#color_fast_txt").val();
		var eq_user_bg = $("#color_pole").val();
		var eq_user_txt = $("#color_pole_txt").val();
		var eq_lenta = $("#color_opt").val();
		var eq_event = $("#color_text").val();
	
		$.post("change_design.php", { bg: eq_bg, fast_bg: eq_fast_bg, fast_txt: eq_fast_txt, user_bg: eq_user_bg, user_txt: eq_user_txt, lenta: eq_lenta, event: eq_event },
		function(data){
		alert(data);
		});
	});
	
	$("#accept_changes").click(function() {
	var oldpassw = $("#old_pass").val();
	var email = $("#email_new").val();
	var newpass = $("#new_pass").val();
	var confirm = $("#conf_pass").val();
		$.post("update_user_info.php", { oldpass: oldpassw , new_mail: email, new_passw: newpass , conf_pass: confirm },
		function(data){
		alert(data);
		});
	
	});
	
	$("#mod_def").click(function() {
	$.ajax(
			{
				url: 'change_design.php?default=true',
				cache: false,
				success: function(message)
				{
					alert("Готово :)");
				}
			});
	});
	
	var check_now;
	var auto_update = 1;
	
	
	
		$('#auto_view').live('mouseover', function(e) {
			$.ajax(
			{
				url: 'check_user.php?user=' + nextuser,
				cache: false,
				success: function(message)
				{
					$("#indi").empty().append(message);
				}
			});
		});
		
		$('#born_r').live('click', function(e) {
			$.ajax(
			{
				url: 'check_user.php?user=' + nextuser,
				cache: false,
				success: function(message)
				{
					$("#indi").empty().append(message);
				}
			});
		}); 

	$(".lenta").click(function()
	{
		if ($("#myinfo").is(":hidden")){
			$("#myinfo").slideDown("slow");
		}
		else
		{
			$("#myinfo").slideUp("slow");
		}
	});


	
	$("#rnamec").click(function(){
	
	var tex = $("#rname").val();
	
	aa = encodeURI(tex);
	
		if ( aa.length > 3 )
		{
		$("#psevdonim").empty().append(tex);
			$.ajax(
			{
				url: "nastr.php?nastr=true&new=" + aa,
				cache: false,
				success: function(message)
				{
					alert("Променено успешно :)");
				}
			});
		$("#rname_pole").slideUp();
		}
	});


	$("#chps").click(function(){
		$("#rname_pole").slideDown();
	});

	$("#rnamen").click(function(){
		$("#rname_pole").slideUp();
		
	});
	
	  
});

	function Do_friend_update()
	{
		var text = $('#user_pole').val();
		text = encodeURI(text);
		var mail = $('#pole_email').val();
		Friends_update("search_friend.php?do=search&user=" + text + "&mail=" + mail);
	}

	function Zatvori()
	{
		$('#mask').hide();
		$('.window').hide();
	}

	function Friends_update(link)
	{
	$.ajax(
		{
			url: link,
			cache: false,
			success: function(message)
			{
				$("#dobavi").empty().append(message);
			}
		}); 
	}

	function refresh()
	{
	users("");
	setTimeout("refresh();",3000);
	}


	function chatWith(user)
	{
	user = 'chatwith.php?with=' + user;
	var win = window.open(user, "chat", 'height=400,width=570,left=100,top=100 scrollbars=no');
	win.focus();
	return true;
	}

	function openWindow(link)
	{
	var openwin = window.open(link, "chat", 'height=400,width=550,left=100,top=100 scrollbars=no');
	openwin.focus();
	return true;
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




var nastr_request = false;

function nastr(text) 
{
text = encodeURI(text);
urla = 'nastr.php?new=' + text;
$.ajax(
    {
        url: urla,
        cache: false,
        success: function(message)
        {
		//alert(message);
        }
    }); 

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


var newmsg_request = false;

function newmsg() 
{
$.ajax(
		{
			url: "newmsg.php",
			cache: false,
			success: function(message)
			{
				$("#newmsg").empty().append(message);
			}
		});
}
