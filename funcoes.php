<?php 

$nome = "Roberto";

function teste()
{
	global $nome;
	echo $nome;
}

teste();

?>