<?php 
require_once '../validacao_cpf.php';
class Documento {

	private $numero;

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}
}

class CPF extends Documento {

	public function validar():bool{
		return validarCPF($this->getNumero());
	}
}

$cpf = new CPF;
$cpf->setNumero("04057202544");
var_dump($cpf->validar());
echo "<br>";
echo $cpf->getNumero();
 ?>