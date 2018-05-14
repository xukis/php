<?php

$nome = "Andre";

function teste(){

	global $nome;
	echo $nome;

}

function teste2(){

$nome = " Luís ";
echo $nome."agora no teste 2";

}


teste();

teste2();

?>