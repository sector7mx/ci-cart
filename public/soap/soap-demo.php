<?php

$options = array('uri' => 'http://myapi.local',
    'trace' => 1,
    'location' => 'http://myapi.local/soap/');

try{
$client = new SoapClient(NULL, $options);

    $response = $client->eightBall();
    echo $response;

} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

