<?php

include('Library.php');

$lib = new Library();
$response = $lib->eightBall();
echo $response;
