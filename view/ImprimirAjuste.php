<?php
require_once '../model/AjusteProducto.php';
require_once '../model/Model.php';
session_start();
$ajuste = $_SESSION['ajuste'];
$numAjus = $ajuste->getNUMEROAJUSTE();
$idprod=$ajuste->getIDPRODUCTO();
$model=new Model();
$producto=$model->getpProducto($idprod);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <div id="impresion">
            <h1>MÓDULO INVENTARIO</h1>
            <h2>N° <?php echo $numAjus; ?></h2>
            <table border="4">
                <tr>
                    <td><h4>ID AJUSTE</h4></td>
                    <td><h4><?php echo $ajuste->getIDAJUSTE(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>ID PRODUCTO</h4></td>
                    <td><h4><?php echo $ajuste->getIDPRODUCTO(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>DETALLE</h4></td>
                    <td><h4><?php echo $ajuste->getDETALLE(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>MOTIVO DEL AJUSTE</h4></td>
                    <td><h4><?php echo $ajuste->getCABECERA(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>FECHA DEL AJUSTE</h4></td>
                    <td><h4><?php echo $ajuste->getFECHAAJUSTE(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>CANTIDAD</h4></td>
                    <td><h4><?php echo $ajuste->getCANTIDAD(); ?></h4></td>
                </tr>
                <tr>
                    <td><h4>STOCK DISPONIBLE</h4></td>
                    <td><h4><?php echo $producto->getSTOCK(); ?></h4></td>
                </tr>
            </table>
            <h3><a href="javascript:imprSelec('impresion')" class="btn-info">Aceptar</a></h3>
            <script type="text/javascript">
                function imprSelec(historial) {
                    var ficha = document.getElementById(historial);
                    var ventimp = window.open('', 'new div', 'height=500,width=900');
                    ventimp.document.write("");
                    ventimp.document.write(ficha.innerHTML);
                    ventimp.document.close();
                    ventimp.print();
                    ventimp.close();
                }
            </script>
        </div>
        <form action="../controller/controller.php">
            <input type="hidden" value="listar_producto" name="opcion">
            <table>
                <tr>                                        
                    <td><input type="submit" value="VOLVER A PRODUCTOS" class="btn btn-info"></td>                        
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
