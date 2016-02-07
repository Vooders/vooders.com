/**
 * Application: Markets Meet
 *
 * Version: 0.1.1
 *
 * Framework: CakePHP
 * Version: 3.0.*
 *
 * AJAX form handler
 *
 */
 $function(){
 	$('.js-ajax-submit').submit(function(){
 		// Serialize form data
 		var formData = $(this).serialize();
 		// Get form action
 		var formUrl = $(this).attr('action');
 		// Switch the success function for different forms
 		var fSwitch = $(this).attr('data-ajaxform-id');

 		$.ajax({
 			type: 'POST',
 			url: formUrl,
 			data: formData,

 			success: function(data){
 				// Example :
 				if(fswitch === 'my-form-id'){


 				}
 			},
 			error: function(){
 				
 			}
 		})
 	})
 }