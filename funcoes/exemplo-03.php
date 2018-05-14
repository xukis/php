<?php 

function ola($texto="Mundo", $periodo="Bom dia"){

	return "Olá $texto! $periodo! <br>";

}

echo ola("Mundo", "Bom dia");
echo ola("","André");
echo ola("Satanás","Boa tarde");
echo ola("Satanás","");

 ?>