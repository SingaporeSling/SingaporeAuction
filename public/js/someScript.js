// $(document).ready(function(){

//       $(".container").shapeshift({
//         minColumns: 3
//       });
// 	function locationHashChanged() {
// 		if (location.hash === "#login") {
// 			$('#content-change').load(base_url + '/login');
// 		}
// 		if(location.hash === "#all-products") {
// 			$('#content-change').load(base_url + '/products/all-products');
// 		}

// 		if(location.hash.substring[1] === '#profile') {
// 			$('#content-change').load(base_url + '/users/profile' + location.hash.substring(location.hash.length - 1)); // this doesn't work, 
// 			// TODO inject current user data - I can give the load function a data object to work with the PHP (I think!).
// 		}

// 		if(location.hash.substring[1] === '#view-product') {
// 			$('#content-change').load(base_url + '/products/view-product' + location.hash.substring(location.hash.length - 1)); // this doesn't work, 
// 			// TODO inject current user data - I can give the load function a data object to work with the PHP (I think!).
// 		}

// 		if (location.hash === '#confirm') {
// 			$('#content-change').load(base_url + '/users/confirm'); 
// 		};
		
// 		if (location.hash === '#create_product') {
// 			$('#content-change').load(base_url + '/products/create_product'); 
// 		};
// 	}

// 	window.onhashchange = locationHashChanged;

// 	$('.view-product').on('click', function(ev) {
// 		var productHref = $(this).attr('location'),
// 		productId = productHref.substring(productHref.length - 1);
// 		window.location.hash = 'view-product/' + productId; // To add logic for figuring out which product this is.
// 	})

// 	$('.view-profile').on('click', function(ev) {
// 		var productHref = $(this).attr('location'),
// 		productId = productHref.substring(productHref.length - 1);
// 		window.location.hash = 'view-product/' + productId; // To add logic for figuring out which product this is.
// 	})

// 	$('#create_product').on('click', function(ev) {
		
// 		window.location.hash = 'create_product';
// 	});

// 	$('#confirm').on('click', function(ev) {
		
// 		window.location.hash = 'confirm';
// 	});

// 	$('#create_product').on('click', function(ev) {
		
// 		window.location.hash = 'create_product';
// 	});

// 	$('#login').on('click', function(ev) {
		
// 		window.location.hash = 'login';
// 	});

// 	$('#all-products').on('click', function() {
// 		window.location.hash = 'all-products';
// 	})

// 	$('#home').on('click', function() {
// 		window.location.href = base_url;
// 	})

// 	// submits

// 	$('#create_product_form').on('submit', function(ev){
// 		ev.preventDefault();
// 		$.post(base_url + '/save-product', $(this).serialize(), function(data){
// 			if(data.success){
// 				window.location.href = base_url + '/all-products';
// 			} else{
// 				if(data.type == 'form_error'){
// 					showErrors(data.errors);
// 				} else{
// 					$('.error.login').text(data.error);
// 				}
// 			}
// 		});
// 	});

// 	$('body').on('submit', '#profile_form', function(ev){
// 		ev.preventDefault();
// 		$.post(base_url + '/set-profile/' + $('#user_id').val() , $(this).serialize(), function(data){
// 			if(data.success){
// 				$('.sex').text(data.user.sex);
// 				$('.about-me').text(data.user.about_me);
// 			}
// 		});
// 	});

// 	$('body').on('submit', '#bid_form', function(ev){
// 		ev.preventDefault();
// 		$.post(base_url + '/save-bid', $(this).serialize(), function(data){
// 			if(data.success){
// 				window.location.href = base_url + '/all-products';
// 				$('#successful_bid').text('Thank you for your bid! You can now continue your journey through our Auction!');
// 			} else {
// 				$('.error.bid').text(data.error);
// 			}
// 		});
// 	});

// });


// window.showErrors = function(errors){
// 	$.each(errors, function(key, value){
// 		$('.error.'+ key).text(value);
// 	});
// }