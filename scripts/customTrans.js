$(document).ready(function()
{

	var FADE_SPEED = 100; 
	
	$('.line-start').on('click', function()
	{

		//Remove the current style
		$('.line-start.current-line').removeClass('current-line'); 

		//Add to the new clicked one. 
		$(this).addClass('current-line', function()
		{
			
		}); 

		



		//Get the ID of the clicked. 
		var clicked_ID = $(this).attr('id'); 

		//Fade out the current shown tree. 
		$('.family-line.current-shown').fadeOut(FADE_SPEED, function()
		{
			//Remove the class of the current. 
			$(this).removeClass('current-shown'); 

			//Fade in the new tree. 
			$('#tree_' + clicked_ID).fadeIn(FADE_SPEED, function()
			{
				//Add the class to show it is shown.
				$(this).addClass('current-shown'); 
			})
		}); 
	// END CLICK EVENT
	});


	$('.time_plot').on('mouseover', function(e)
	{
		
		var id = $(this).attr('id'); 
		$('#popover_' + id).fadeIn(1, function()
		{
			 
			$(this).offset({left:e.pageX,top:e.pageY});
			$(this).css('display', 'block');
		}); 
	}); 

	$('.time_plot').on('mouseout', function(e)
	{
		var id = $(this).attr('id'); 
		$('#popover_' + id).fadeOut(100, function()
		{
			$(this).css('display', 'none'); 
		}); 
	}); 

}); 