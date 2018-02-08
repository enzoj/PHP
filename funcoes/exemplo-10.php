<?php 


function teste($callback){

	// Something... very... slow...

	 $callback();
}

teste(function(){

	echo "Terminou, ufa!";
	
});


 ?>