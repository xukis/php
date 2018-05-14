<?php 

class Pessoa {

	public $nome;//Atributo

	public function falar() {//Método

		return "O meu nome é ".$this->nome;

	}

}

$andre = new Pessoa();
$andre->nome = "André Polo Norte";
echo $andre->falar();

 ?>