<?php
include_once 'vendor/econea/nusoap/src/nusoap.php';
//include_once 'lib/nusoap.php';
require_once '../model/Model.php';
$cliente = new nusoap_client("https://inventariotfs.azurewebsites.net/webservice/servicio.php",false);
//$cliente = new nusoap_client("http://localhost:8081/inventario/webservice/ws.php?wsdl",true);

//$n1=3;
//$n2=2;
//$parametros=array('num1'=>$n1,'num2'=>$n2);
//$respuesta=$cliente->call("MiFuncion",$parametros);
//
//print_r($respuesta);
//

$llave="asdñlf56456mañlgaGSAGADGADGG54ga4";
$parametros=array('llave'=>$llave);
$respuesta=$cliente->call("getStock",$parametros);
$listaProductos= json_decode($respuesta);
echo "<div ALIGN=\"center\">";
echo "<h1>Lista de productos en JSON:</h1>";
echo "<code>".$respuesta."</code></br>";
echo "<h1>CONTENIDO</h1>";
echo "<table border=\"1\">";
echo "<tr><th>IDPRODUCTO</th><th>CODIGO</th><th>NOMBREPRODUCTO</th><th>DESCRIPCION</th><th>IVA</th><th>COSTO</th><th>PVP</th><th>ESTADO</th><th>STOCK</th></tr>";
foreach ($listaProductos as $producto){
    echo "<tr><td>".$producto->IDPRODUCTO."</td><td>".$producto->CODIGO."</td><td>".$producto->NOMBREPRODUCTO."</td><td>".$producto->DESCRIPCION."</td><td>".$producto->IVA."</td><td>".$producto->COSTO."</td><td>".$producto->PVP."</td><td>".$producto->ESTADO."</td><td>".$producto->STOCK."</td></tr>";
}
echo "</table>";
echo "</div>";

?>