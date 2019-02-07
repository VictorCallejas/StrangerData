$(document).ready(function(){
	$("#btn-contact").click(function(){$(".modal1").css("display","flex");
	$("#email_div").fadeIn(100)});
	$(".cerrar_contact").click(function(){$(".modal1").css("display","none");
	$("#email_div").fadeOut(300)})
});
