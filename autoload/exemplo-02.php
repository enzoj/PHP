<?php 

function incluirClasses($Classe){
	if (file_exists($Classe.".php") == true){
		require_once($Classe.".php");
	}
}

spl_autoload_register("incluirClasses");
spl_autoload_register(function($Classe){
	if (file_exists("Abstratas" . DIRECTORY_SEPARATOR . $Classe.".php") == true){
		require_once("Abstratas" . DIRECTORY_SEPARATOR . $Classe.".php");
	}
});

spl_autoload_register(function($Interface){
	if (file_exists("Interfaces" . DIRECTORY_SEPARATOR . $Interface.".php") == true){
		require_once("Interfaces" . DIRECTORY_SEPARATOR . $Interface.".php");
	}
});

$carro = new DelRey();
$carro->acelerar(80);

 ?>