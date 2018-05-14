<?php 

class Carro {

	private $modelo;
	private $motor;
	private $ano;

	public function getModelo(){

		return $this->modelo;

	}

	public function setModelo($modelo){

		$this->modelo = $modelo;

	}

	public function getMotor():float{

		return $this->motor;

	}

	public function setMotor($motor){

		$this->motor = $motor;

	}

	public function getAno():int{

		return $this->ano;

	}

	public function setAno($ano){

		$this->ano = $ano;

	}

	public function exibir(){

		return array(
			"modelo"=>$this->getModelo(),
			"motor"=>$this->getMotor(),
			"ano"=>$this->getAno()

		);

	}
}

$sonic = new Carro();
$sonic->setModelo("Sonic HB LTZ");
$sonic->setMotor("1.6");
$sonic->setAno("2012");

var_dump($sonic->exibir());

 ?>