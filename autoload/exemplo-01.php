<?php 

function __autoload($classe){
	require_once("$classe.php");
}

$carro = new DelRey();
$carro->acelerar(80);

 ?>