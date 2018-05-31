<?php 

$cep = $_POST["cep"];
$link = "https://viacep.com.br/ws/$cep/json/";

$ch = curl_init($link);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response, true);

echo "Logradouro: ";
print_r($data["logradouro"]);
echo "<br>Bairro: ";
print_r($data["bairro"]);
echo "<br>Cidade: ";
print_r($data["localidade"]);
echo "<br>Estado: ";
print_r($data["uf"]);

 ?>