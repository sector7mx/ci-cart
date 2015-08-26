<?php

include('Library.php');

$options = array('uri' => 'http://api.local/soap');
$server = new SoapServer(NULL, $options);
$server->setClass('Library');

$server->handle();
