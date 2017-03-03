$(document).ready(function(){
	$('.js-reveal-trigger').on('click', function(){
		var id = $(this).data('id');
		$('.js-reveal-div-'+id).slideToggle();
	});
});