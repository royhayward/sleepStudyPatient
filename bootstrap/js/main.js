$('#logoutClicked').click(function(){
	$.ajax({
		url: "/index.php/login/logout",
		
		success: function(msg) {
			window.location = "/index.php/login";
		}
	});
	return false;
});

$('#newUserClicked').click(function(){
	$.ajax({
		url: "/index.php/admin/newUser",
		
		success: function(msg) {
			window.location = "/index.php/admin/newUser";
		}
	});
	return false;
});

$(document).ready(function(){
	if($(".login").size() > 0){
		$('body').addClass("loginpage");
	}
});