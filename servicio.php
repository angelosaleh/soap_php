<?php

$namespace="http://localhost/soap";

require_once('lib/nusoap.php');
require_once('noticias.php');
# Configuracion del servidor de webservices
$server=new nusoap_server();
$server->debug_flag=false;
$server->configureWSDL('Noticias',$namespace);
$server->wsdl->schemaTargetNamespace=$namespace;

$server->wsdl->addComplexType(
			      'Noticias',
			      'complexType',
			      'struct',
			      'sequence',
			      '',
			      array(
				    'pais' => array('name' => 'pais','type' => 'xsd:string'),
				    'tipo' => array('name' => 'tipo','type' => 'xsd:string')
				    )
			      );

$server->register('noticias',
		  array("pais"=>"xsd:string","tipo"=>"xsd:string"),
		  array("estado"=>"xsd:string","detalle"=>"xsd:string"),
		  $namespace.'#noticias',
		  '',                                    // style
		  '',									 // message
		  '',
		  'Web service para las noticias'// documentation
		  );

# verifico variables HTTP e inicio servicio
$HTTP_RAW_POST_DATA=isset($GLOBALS['HTTP_RAW_POST_DATA'])  ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
$server->service($HTTP_RAW_POST_DATA);
exit();
?>
