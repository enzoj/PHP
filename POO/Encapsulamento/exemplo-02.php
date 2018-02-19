<?php 

class Pessoa {

	public $nome = "Rasmus Lerdof";
	protected $idade = 48;
	private $senha = "123456";

	public function ver(){

		echo $this->nome . "<br>";
		echo $this->idade . "<br>";
		echo $this->senha . "<br>";
	}
}

class Programador extends Pessoa {

	public function ver(){

		echo get_class($this) . "<br>";

		echo $this->nome . "<br>";
		echo $this->idade . "<br>";
		echo $this->senha . "<br>";
	}

}

$obj = new Programador();

//echo $obj->nome . "<br>";

$obj->ver();

 ?>