$(document).ready(function() {
	$('.bxslider').bxSlider({
  		minSlides: 1,
  		maxSlides: 3,
  		slideWidth: 160,
  		slideMargin: 10,
  		auto:true,
  		autoStart:true,
  		pager:false,
  		controls:true,
	});
	$("#login-form").submit(function(e) {
	    e.preventDefault();
		$("#error").css("display:none");
		var user = $("#user").val();
		var password = $("#password").val();
		if ((user !== "" && password !== "") && (user !== undefined && password !== undefined)) {
			var request = $.ajax({
				method: "POST",
  				url: "login.php",
  				data: { user :user, password:password },
  				dataType: "json"
			});
			request.done(function(response) {
				location.href = response;
			});
			request.fail(function(response) {
				$("#error").css("display","block");
			});
		}
	});
});