<?php 

$pessoa = array(
	'nome' => 'André',
	'idade'=>38

);

foreach ($pessoa as &$value) {
	
	if (gettype($value) === 'integer') $value += 10;

	echo $value.'<br>';
}

print_r($pessoa);

 ?>