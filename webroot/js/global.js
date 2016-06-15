/**
 * VOODERS.COM
 *
 * Version: 0.1.1
 *
 * Framework: CakePHP
 * Version: 3.0.*
 *
 * Global JavaScript file
 *
 */
$(document).ready(function () {

 /**
	* Foundation declarations
	*/
	$(document).foundation();
	// Top nav bar
	topMenu = new Foundation.Revael($('#topMenu'));
	// Profile page
	addEmail = new Foundation.Revael($('#addEmail'));
	addBattleTag = new Foundation.Revael($('#addBattleTag'));



	// Check if the entered username exists in the database
	$('.js-users').blur(function(){
		$.ajax({
			type: 'get',
			url: '/users/get_users/'+$(this).val(),

			success: function(data){
				console.log(data);
				if(data === '0'){
					$('.info-span').html('This username is unavailable.')
				} else {
					$('.info-span').html('This username is available.')
				}
			},
			error: function(){
				console.log('Error');
			}
		});
	});


	$('.js-login').blur(function(){
		$.ajax({
			type: 'get',
			url: '/users/get_users/'+$(this).val(),

			success: function(data){
				console.log(data);
				if(data === '0'){
					$('.password').prop("disabled", false);
					$('.password').focus();
					$('.info-span').html('');
				} else {
					$('.info-span').html('This username not recognised.');
				}
			},
			error: function(){
				console.log('Error');
			}
		});
	});


	$('.js-login-pass').blur(function(){
		var val = $(this).val();
		if (val.length > 4){
			$('.submitButton').prop("disabled", false);
			$('.submitButton').focus();
		}
	});


	/**
     * Confirm two inputs are the same
     * and display the result to the user
     */
    $('.box2').keyup(function(){
      var first = $('.box1').val();
      var second = $(this).val();
      var goodColor = "#66cc66";
      var badColor = "#ff6666";
      
      if (first === second){
        $(this).css("background-color", goodColor);
        $('.confirm-msg').html('<button type="submit">Submit</button>');
        $('.confirm-msg').css("color", goodColor);
        $('.submitButton').prop("disabled", false);
      } else {
        $(this).css("background-color", badColor);
        $('.confirm-msg').text('Passwords do not match!');
        $('.confirm-msg').css("color", badColor);
        $('.submitButton').prop("disabled", true);
      }
    });
});