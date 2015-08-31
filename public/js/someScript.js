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
	$('#add-or-login').on('click', function(ev) {
		$('#content-change').load(base_url + '/login', function() {
			location.hash = '/login';
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
			if(data.success){
				window.location.href = base_url + '/login';
			} else {
				$('.error.logout-fail').text(data.error);
			}
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

 var slide = kendo.fx($("#slide-in-share")).slideIn("left"),
        visible = true;
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

    $("#slide-in-handle").click(function(e) {
        if (visible) {
            slide.reverse();
        } else {
            slide.play();
        }
        visible = !visible;
        e.preventDefault();
    });



function showErrors(errors){
	$.each(errors, function(key, value){
		$('.error.'+ key).text(value);
	});
}