$( document ).ready(function() {
  

	$("#div_mensaje").fadeTo(5000, 200).slideUp(800, function(){
		$(this).remove(); 
	});

});