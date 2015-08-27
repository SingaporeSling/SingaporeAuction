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

	$('#login_form').on('submit', function(ev){
		ev.preventDefault();
		$.post(base_url + '/login-user', $(this).serialize(), function(data){
			if(data.success){
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

});

function showErrors(errors){
	$.each(errors, function(key, value){
        $('.error.'+ key).text(value);
    });
}