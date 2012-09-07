$(document).ready(function() {
	
	$('#sidebar-content ul li a').click(function(e){
		 e.preventDefault(); 
	 var toLoad = $(this).attr('href');  
 
	$('#content').load(toLoad);
	return false;

});
	});
