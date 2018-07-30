<?php

require_once 'lib/nusoap.php';
require_once '../model/Model.php';

$servicio = new soap_server();


$ns = "urn:miserviciowsdl";
$servicio->configureWSDL("MiPrimerServicioWeb",$ns);
//$servicio->schemaTargetNamespace = $ns;

if(!isset($HTTP_RAW_POST_DATA)){
    $HTTP_RAW_POST_DATA= file_get_contents("php://input");
}

function MiFuncion($num1, $num2){

 $resultadoSuma = $num1 + $num2;
 $resultado = "El resultado de la suma de " . $num1 . "+" .$num2 . " es: " . $resultadoSuma;	
 return $resultado;
 
}

function getStock($llave){
    $modelo=new Model();
    $resultado=$modelo->getProductosWS();
    return $resultado;
}


$servicio->register("MiFuncion", array('num1' => 'xsd:integer', 'num2' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );
$servicio->register("getStock",array('llave'=>'xsd:string'),array('return'=>'xsd:string'),$ns);


$servicio->service($HTTP_RAW_POST_DATA); 




?>