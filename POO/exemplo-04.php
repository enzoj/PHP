<?php 

class Endereco{

	private $logradouro;
	private $numero;
	private $cidade;

	public function __construct($a, $b, $c){

		$this->logradouro = $a;
		$this->numero = $b;
		$this->cidade = $c;
	}
}


$endereco = new Endereco("Rua Rua", "123", "Salvador");

var_dump($endereco);

 ?>