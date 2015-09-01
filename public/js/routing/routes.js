var sammyApp = $.sammy(function() {
 
  this.get('#/', function() {
   	clearRegLogin();
  });

  this.get('#/register', function () {

  	$.get(base_url + '/register', {}, function(html){
  		clearRegLogin();
  		$('#reg_login_form').html(html);
  	});

  });

  this.get('#/login', function() {

  	$.get(base_url + '/login', {}, function(html){
  		clearRegLogin();
  		$('#reg_login_form').html(html);
  	});

  });

  this.post('#/save-user', function() {

  	clearMessages();

  	$.post(base_url + '/save-user', $('#register_form').serialize(), function(data){
		if(data.success){
			$('#register_form')
			.after('<p class="thank-you-msg">Thanks for registering. Please visit your email to confirm the registration!</p>');
		} else{
			showErrors(data.errors);
		}
	});

  });

  this.post('#/login-user', function() {

  	clearMessages();

  	$.post(base_url + '/login-user', $('#login_form').serialize(), function(data){
		if(data.success){
			clearRegLogin();
			removeLoginButtons();
			$("#greeting").text("Hello, "+ data.user.first_name +"! Welcome to the Auction!");
			$('.main-nav').append('<li id="logout"><a href="#/logout">Logout</a></li>');

		} else{
			$('.error').text(data.error);
		}
	});

  });

  this.get('#/logout', function() {

  	clearMessages();

  	$.get(base_url + '/logout', {}, function(data){
		removeLoginButtons();
		$('.main-nav').append('<li id="register"><a href="#/register">Register</a></li>');
		$('.main-nav').append('<li id="login"><a href="#/login">Login</a></li>');

		clearRegLogin();
	});

  });

});

$(function () {
	sammyApp.run('#/');
});

function clearRegLogin() {
	$("#reg_login_form").remove();
	$('#content-change').prepend('<div id="reg_login_form"></div>');
}

function clearMessages() {
	$('.thank-you-msg, .errors, .error').text('');
}

function removeLoginButtons() {
	$('#logout, #register, #login').remove();
}