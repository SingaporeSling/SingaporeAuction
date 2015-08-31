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

	 $('body').on('submit', '#logout-form', function(ev){
		ev.preventDefault();
		$.post(base_url + '/logout', function(data){
			if(data.success){
				window.location.href = base_url + '/login';
			} else {
				$('.error.logout-fail').text(data.error);
			}
		});
	});

});

 var slide = kendo.fx($("#slide-in-share")).slideIn("left"),
        visible = true;

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