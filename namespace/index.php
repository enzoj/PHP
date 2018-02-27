<?php 

require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("John Doe");
$cad->setEmail("john.doe@nobody.com");
$cad->setSenha("random");

$cad->registrarVenda();
 ?>