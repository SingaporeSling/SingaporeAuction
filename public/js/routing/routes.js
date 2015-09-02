var sammyApp = Sammy('#content', function() {

    this.get('#/', function() {
        clearContent();

        $.get(base_url + '/get-home', function(html){
          $('#content-change').append(html);
        });

    });

    this.get('#/login', function() {
      clearContent();

      $.get(base_url + '/login', {}, function(html){
        $('#content-change').html(html);
      });

    });

    this.get('#/register', function () {

      clearContent();

      $.get(base_url + '/register', {}, function(html){
        $('#content-change').html(html);
      });

    });

    this.post('#/login-user', function() {

      clearMessages();

      $.post(base_url + '/login-user', $('#login_form').serialize(), function(data){

        if(data.success){

          removeLoginButtons();
          $("#greeting").text("Hello, "+ data.user.first_name +"! Welcome to the Auction!");
          $('#main-nav').append('<li id="logout"><a href="#/logout">Logout</a></li>');

          goHome();

        } else {
          $('.error').text(data.error);
        }

      });  
    });

    this.get('#/logout', function() {

      clearMessages();

      $.get(base_url + '/logout', {}, function(data){
        
        removeLoginButtons();
        $('#main-nav').append('<li id="register"><a href="#/register">Register</a></li>');
        $('#main-nav').append('<li id="login"><a href="#/login">Login</a></li>');

        goHome();
      });

   });

    this.post('#/save-user', function() {

      clearMessages();

      $.post(base_url + '/save-user', $('#register_form').serialize(), function(data){

        if(data.success) {

          $('#register_form').after('<p class="thank-you-msg">Thanks for registering. Please visit your email to confirm the registration!</p>');
          clearForm();

        } else {
          showErrors(data.errors);
        }

      });
    });

    this.get('#/confirm/:user_id/:token', function() {

      $.get(base_url + '/confirm/' + this.params['user_id'] + '/' + this.params['token'], function(data){
        if (data.success) {

          $.get(base_url + '/login', {}, function(html){
            $('#content-change').html(html);
            $('#login_form legend').after('Thank you for your registration. Please login below');
          });

        } else {
          goHome();
        }
      });

    });

    this.get('#/all-products', function() {
        $.get(base_url + '/all-products', {}, function(data){
          $('#content-change').html(data);
      });
    });

    this.get('#/category/:category', function() {
      clearContent();

      $.get(base_url + '/category/' + this.params['category'], function(html){
        $('#content-change').html(html);
      });

    });

    this.get('#/create-product', function() { // TODO add a button for this one, Magi :D
        $.get(base_url + '/create-product', {}, function(data){
          $('#content-change').html(data);

      });
    });

    this.get('#/profile/:id', function() { // TODO make work for other user IDs
        $.get(base_url + '/profile/' +  this.params['id'], {}, function(data){ 
          $('#content-change').html(data);
      });
    });

    this.get('#/view-product/:id', function() {

        $.get(base_url + '/view-product/' +  this.params['id'], {}, function(data){ 
          $('#content-change').html(data);
      });
    });
});

$(function () {
	sammyApp.run('#/');
});

function clearRegLogin() {
	$("#reg_login_form").remove();
	$('#reg_login_form').html('<div id="reg_login_form"></div>');
}

function clearMessages() {
	$('.thank-you-msg, .errors, .error').empty();
}

function removeLoginButtons() {
	$('#logout, #register, #login').remove();
}

function clearContent() {
  $('#content-change').empty();
}

function goHome() {
  window.location.href = base_url + '/#/';
}

function goUrl(url) {
  window.location.href = base_url + '/#/' + url;
}

function showErrors(errors) {
  $.each(errors, function(key, value){
    $('.error.'+ key).text(value);
  });
}

function clearForm() {
  $('input:not([type=submit]), textarea, select').val('');
}