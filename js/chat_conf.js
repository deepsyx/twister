var chat_id = 0;

$(document).ready(function(){

	$("#btn_test").click(function(){
	$("#asd").slideRight();
	});


	
	$(".image_avat").mouseover(function(){
	var currentId = $(this).attr('id');
	$(".info_field").hide();
	$("#info_" + currentId).slideRight();
	});
	
	
	$("#hide").click(function() {
	$("#mask").hide();
	$("#deisvie").hide();
	});
	
	$("#clik").click(function() {
	$("#joined_users").empty().append("asdsadas");
	});
	
});

function getNewUsers()
{
	$.post("users_from_chat.php", { id: chat_id },
		function(data){
	$("#content-holder").empty().append(data);

		});
}

function showup()
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

function refresh_it()
{
getNewUsers();
GetAll();
setTimeout("refresh_it();",3000);
}

function SetChat(id) { chat_id = id; }

function post()
{
var info_a = $("#text").val();

		$.post("conf_chat_do.php", { post_text: info_a ,chat_id: chat_id },
		function(data){
		$("#text").val("");
		
		$("#main").empty().append(data);
		document.getElementById("main").scrollTop  = '10000';
		});
		
}

function getInfoUser(username,id,rname)
{
$("#getinfo_pole").empty().append("User: " + username + "<br />Статус: <img src='images/status/" + id + "'>");
}

function GetAll()
{

	if ( chat_id != 0 )
	{
		$.post("conf_chat_do.php", { chat_id: chat_id },
		function(data){
		$("#main").empty().append(data);
				document.getElementById("main").scrollTop  = '10000';

		});
	
	}
}


