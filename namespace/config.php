<?php 

spl_autoload_register(function($nameClass){
	
	var_dump($nameClass);

	$dirClass = "Class";
	$fileane = $dirClass . DIRECTORY_SEPARATOR . $nameClass .".PHP";

	if (file_exists($fileane)) {
		require_once($fileane);
	}


})

 ?>