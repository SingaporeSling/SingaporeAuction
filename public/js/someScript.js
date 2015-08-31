$(document).ready(function(){
	
	$('#register_form').on('submit', function(ev){
		ev.preventDefault();
		$.post(base_url + '/save-user', $(this).serialize(), function(data){
			if(data.success){
				$('#register_form')
				.after('<p>Thanks for registering. Please visit your email to confirm the registration!</p>');
			} else{
				showErrors(data.errors);
			}
		});
	});
	$('#login').on('click', function(ev) {
		var neshto = $.get(base_url + '/login', {}, function(data){
			
			window.location.hash = 'login';
			$('#content-change').empty().append(data);
		});
	});
	
	$('body').on('submit', '#login_form', function(ev){
		ev.preventDefault();
		$.post(base_url + '/login-user', $(this).serialize(), function(data){
			
			if(data.success){
				$('#greeting').text("Hello, " + "! Welcome to the Auction!");
				window.location.href = base_url;
				
			} else{
				$('.error').text(data.error);
			}
		});
	});

	$('#create_product_form').on('submit', function(ev){
		ev.preventDefault();
		$.post(base_url + '/save-product', $(this).serialize(), function(data){
			if(data.success){
				window.location.href = base_url + '/all-products';
			} else{
				if(data.type == 'form_error'){
					showErrors(data.errors);
				} else{
					$('.error.login').text(data.error);
				}
			}
		});
	});

	$('body').on('click', '#logout', function(ev){
		ev.preventDefault();
		$.post(base_url + '/logout', function(data){
			window.location.reload();
		});
	});

	$('body').on('submit', '#profile_form', function(ev){
		ev.preventDefault();
		$.post(base_url + '/set-profile/' + $('#user_id').val() , $(this).serialize(), function(data){
			if(data.success){
				$('.sex').text(data.user.sex);
				$('.about-me').text(data.user.about_me);
			}
		});
	});

	$('body').on('submit', '#bid_form', function(ev){
		ev.preventDefault();
		$.post(base_url + '/save-bid', $(this).serialize(), function(data){
			if(data.success){
				window.location.href = base_url + '/all-products';
				$('#successful_bid').text('Thank you for your bid! You can now continue your journey through our Auction!');
			} else {
				$('.error.bid').text(data.error);
			}
		});
	});

});


function showErrors(errors){
	$.each(errors, function(key, value){
		$('.error.'+ key).text(value);
	});
}