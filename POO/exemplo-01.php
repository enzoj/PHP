<?php 

class Pessoa {

	public $nome;

	public function sayMyName()
	{
		
		return "O meu nome é ". $this->nome;

	}
};

$enzo = new Pessoa();
$enzo->nome = "Eraldo Enzo";
echo $enzo->sayMyName();

 ?>