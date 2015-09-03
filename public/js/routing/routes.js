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
          $('.nav.navbar-nav.navbar-right').append('<li id="user-info"><a href="#/profile/'+ data.user.id +'">Your Account</a></li>');

          if (data.user.is_admin == 1)
            $('.nav.navbar-nav.navbar-right').prepend('<li id="user-info"><a href="#/close-products">Close Products</a></li>');

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
        $('#user-info, #close-products').remove();

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

    this.get('#/profile/:id', function(){
      $.get(base_url + '/profile/' + this.params['id'], {}, function(data){
        $('#content-change').html(data);
      });
    });

    this.post('#/set-profile/:id', function(){
      $.post(base_url + '/set-profile/' + this.params['id'], $('#profile_form').serialize(), function(data){
       if(data.success){
         $('.sex').text("Sex: " + data.user.sex);
         $('.about-me').text("About me: " + data.user.about_me);
         clearForm();
       }
     });
    });

    this.get('#/create-product', function() { // TODO add a button for this one, Magi :D
      $.get(base_url + '/create-product', {}, function(data){
        $('#content-change').html(data);
      });
    });

    this.post('#/save-product', function(){
      $.post(base_url + '/save-product', $('#create_product_form').serialize(), function(data) {
       if(data.success){
         goUrl('all-products');
       } else{
         if(data.type == 'form_error'){
           showErrors(data.errors);
         } else{
           $('.error.login').text(data.error);
         }
       }
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

    this.post('#/save-bid', function(){

      clearMessages();

      $.post(base_url + '/save-bid', $('#bid_form').serialize(), function(data){
        if(data.success){
          $("#bid").val('');
          $('.highest-bid').text("Highest bid price is " + data.bid);
          $('#successful_bid').text('Thank you for your bid! You can now continue your journey through our Auction!');
        } else {
          $('.error.bid').text(data.error);
        }
      });
    });

    this.get('#/close-products', function(){
      $.get(base_url + '/close-products', function(html) {
        $('#content-change').html(html);
      });
    });

    this.get('#/close-product/:id', function(){
      var productId = this.params['id'];

      $.post(base_url + '/close-product/' + productId, function(data) {
        
        if (data.success) {
          $('.col-sm-4[data-id="'+ productId +'"]').remove();
        }

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
	$('.thank-you-msg, .errors, .error, #successful_bid').empty();
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