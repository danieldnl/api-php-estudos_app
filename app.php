<?php

define('API_BASE', 'http://localhost/api/?OPTION=');

echo '<p>APLICAÇÃO</p>';

$resultado = api_request('random');

if ($resultado['status'] == 'ERROR') {
    die('Erro na chamada da API!');
}

echo '<pre>';
print_r($resultado);
echo '</pre>';

function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client); 

    return json_decode($response, true);
}
