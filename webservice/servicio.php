<?php
include_once 'vendor/econea/nusoap/src/nusoap.php';
//include_once 'lib/nusoap.php';
include_once '../model/Model.php';

$servicio = new soap_server();


$ns = "urn:miserviciowsdl";
$servicio->configureWSDL("ServicioWebInventario",$ns);
//$servicio->schemaTargetNamespace = $ns;

if(!isset($HTTP_RAW_POST_DATA)){
    $HTTP_RAW_POST_DATA= file_get_contents("php://input");
}

//function MiFuncion($num1, $num2){
// $resultadoSuma = $num1 + $num2;
// $resultado = "El resultado de la suma de " . $num1 . "+" .$num2 . " es: " . $resultadoSuma;	
// return $resultado;
//}

function getStock($llave){
    $cn= mysqli_connect("inventariotfs.mysql.database.azure.com", "JordyTG@inventariotfs", "admin.1234", "inventariotfsbdd");
    $sql="select * from producto";
    $productos=$cn->query($sql);
    $listaProducto=[];
    while($producto= mysqli_fetch_array($productos,MYSQLI_ASSOC)){
        $listaProducto[]=$producto;   
    }
    return json_encode($listaProducto);
    
//    $modelo=new Model();
//    $resultado=$modelo->getProductosWS();
//    return $resultado;
}

//$servicio->register("MiFuncion", array('num1' => 'xsd:integer', 'num2' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );
$servicio->register("getStock",array('llave'=>'xsd:string'),array('return'=>'xsd:string'),$ns);

$servicio->service($HTTP_RAW_POST_DATA); 

?>