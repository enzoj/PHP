<?php 

require_once "validacao_cpf.php";

class Documento{

	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		if (validarCPF($numero) == true){
			$this->numero = $numero;
		}
		else
		{
			throw new Exception("CPF informado não é válido", 1);
			
		}
	}

};

$cpf = new Documento;
$cpf->setNumero("22464262943");

var_dump($cpf->getNumero());

 ?>