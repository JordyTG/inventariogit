<?php
require_once 'lib/nusoap.php';
require_once '../model/Model.php';
$cliente = new nusoap_client("http://localhost:8081/inventario/webservice/servicio.php",false);
//$cliente = new nusoap_client("http://localhost:8081/inventario/webservice/ws.php?wsdl",true);

$n1=3;
$n2=2;
$parametros=array('num1'=>$n1,'num2'=>$n2);
$respuesta=$cliente->call("MiFuncion",$parametros);

print_r($respuesta);


$llave="asdñlf56456mañlgaGSAGADGADGG54ga4";
$parametros=array('llave'=>$llave);
$respuesta=$cliente->call("getStock",$parametros);

print_r($respuesta);


?>