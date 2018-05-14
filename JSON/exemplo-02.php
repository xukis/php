<?php 

$json = '[{"nome":"João","idade":20},{"nome":"Gláucio","idade":25}]';

$data = json_decode($json, true);

var_dump($data);

 ?>