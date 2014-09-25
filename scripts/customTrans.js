$(document).ready(function()
{

	var FADE_SPEED = 100; 
	
	$('.line-start').on('click', function()
	{
		//Get the ID of the clicked. 
		var clicked_ID = $(this).attr('id'); 

		$('.family-line.current-shown').fadeOut(FADE_SPEED, function()
		{
			$(this).removeClass('current-shown'); 

			$('#tree_' + clicked_ID).fadeIn(FADE_SPEED, function()
			{
				$(this).addClass('current-shown'); 
			})




		}); 
				
		
	});


}); 