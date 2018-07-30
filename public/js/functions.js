$(document).ready(function()
	{
		$('#dropdown-user').on('show.bs.dropdown', function(){
	    	$(this).find('.dropdown-menu').first().stop(true,true).slideDown(300);
	  	});

		$('#dropdown-user').on('hide.bs.dropdown', function(){
	    	$(this).find('.dropdown-menu').first().stop(true,true).slideUp(300);
		});

		$('#dropdown-nav').on('show.bs.dropdown', function(){
	    	$(this).find('#dropdown_nav').first().stop(true,true).slideDown(200);
	    	$('#notifikacije').removeClass('fa-bell').addClass('fa-bell-o');
	    	$('#badge').removeClass('badge').html('');
	  	});

		$('#dropdown-nav').on('hide.bs.dropdown', function(){
	    	$(this).find('#dropdown_nav').first().stop(true,true).slideUp(200);
		});



    


   /* $('.delete').on('submit', function(){
      return confirm('Are you sure?');
    });*/
		$('#sort_options').slideDown(200);
		
	});

