<?php
include_once 'lib/nusoap.php';
//include_once '../model/Model.php';
$servicio = new soap_server();
$ns="urn:miserviciowsdl";
$servicio->configureWSDL("MiPrimerServicioWeb",$ns);
$servicio->schemaTargetNamespace=$ns;

$servicio->register("MiFuncion",array('n1' => 'xsd:integer','n2'=>'xsd:integer'),array('return'=>'xsd:string'),$ns);
//$servicio->register("getStock",array('llave'=>'xsd:string'),array('return'=>'xsd:string'),$namespace);

function MiFuncion($n1,$n2){
    $resultado=$n1."+".$n2."=".($n1+$n2);
    return $resultado;
}

//function getStock($llave){
//    $modelo=new Model();
//    $resultado=$modelo->getProductosWS();
//    return $resultado;
//}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$servicio->service($HTTP_RAW_POST_DATA);
?>