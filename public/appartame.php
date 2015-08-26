<?php

/* Recibo variables del carrito de la Tienda del CLIENTE*/
$n = $_POST['qty'];
$c = $_POST['id'];
$p = $_POST['att'];

/* Se almacenan variables recibidas */
$arrayName = array(
	'cantidad' => $n,
	'sku' => $c,
	'propiedades' => $p
);

/* Le regreso RESPUESTA al cliente formato JSON*/
echo json_encode($arrayName);

?>