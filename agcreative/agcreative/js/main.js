/* DOM Ready 
  ===============================================================================*/
$(function()
{		
		//Just a simple click function for mobile nav
		$("#mobile-nav .hamburger").click(function(e)
		{
			e.preventDefault();
			
			$("#header").toggleClass("active");
			
			return false;
		});
});

