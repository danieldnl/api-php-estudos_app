<?php

define('API_BASE', 'http://localhost/api/?OPTION=');

echo '<p>APLICAÇÃO</p>';

for ($i=0; $i < 10; $i++) { 
    $resultado = api_request('random&min=10000&max=10001');

    if ($resultado['status'] == 'ERROR') {
        die('Erro na chamada da API!');
    }

    echo "Valor randômico: {$resultado['data']}<br>";
}

echo 'Processamento finalizado!';


function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client); 

    return json_decode($response, true);
}
