<?php
require_once('../lib/nusoap.php');

                               
$cliente = new nusoap_client('http://localhost/soap/servicio.php?WSDL',true);
$cliente = new nusoap_client('http://localhost/soap/servicio.php?WSDL');
$cliente = new nusoap_client('http://localhost/soap/servicio.php');
$params=array('pais'=>'Colombia','tipo'=>"tecnologia");
$resultado = $cliente->call('noticias',$params);
	
var_dump($resultado);
?>
