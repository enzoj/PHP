<?php 

interface Veiculo {

	public function acelerar($velocidade);
	public function frenar($velocidade);
	public function trocarMarcha($marcha);
}


class Civic implements Veiculo{
	public function acelerar($velocidade){
		echo "Acerelei <br>";
	}

	public function frenar($velocidade){
		echo "Frenei <br>";	
	}

	public function trocarMarcha($marcha){
		echo "Troquei de marcha <br>";	
	}
}

$carro = new Civic;

 ?>