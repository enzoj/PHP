<?php 

namespace Cliente;

class Cadastro extends \Cadastro {
	
	public function registrarVenda(){
		echo "Foi resgistrada uma venda para o cliente " . $this->getNome();
	}
}

 ?>