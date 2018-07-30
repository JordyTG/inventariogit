<?php
require_once '../model/Producto.php';
require_once '../model/Model.php';
session_start();
$listado = unserialize($_SESSION['listadoProductos']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h1>REGISTRO DE AJUSTES</h1>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="listarAjustesProducto">
            <table>
                <tr>
                    <td>Seleccione el Producto </td>                
                    <td>
                        <select name="IDPRODUCTO">
                            <?php
                            foreach ($listado as $est) {
                                ?>
                                <option value="<?php echo $est->getIDPRODUCTO() ?>"><?php echo $est->getNOMBREPRODUCTO() ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="BUSCAR">
                    </td>
                </tr>
            </table>
        </form>
        <table border = 4 >
            <caption>
            </caption>
            <tr>
                <th>ID AJUSTE</th>
                <th>ID PRODUCTO</th>
                <th>DETALLE</th>
                <th>NÚMERO DEL AJUSTE</th>
                <th>CABECERA</th>
                <th>FECHA DEL AJUSTE</th>                
                <th>CANTIDAD</th> 
            </tr>
            <?php
            if (isset($_SESSION['listadoAjust'])) {
                $listado = unserialize($_SESSION['listadoAjust']);
                foreach ($listado as $list) {
                    echo "<tr>";
                    echo "<td>" . $list->getIDAJUSTE() . "</td>";
                    echo "<td>" . $list->getIDPRODUCTO() . "</td>";
                    echo "<td>" . $list->getDETALLE() . "</td>";
                    echo "<td>" . $list->getNUMEROAJUSTE() . "</td>";
                    echo "<td>" . $list->getCABECERA() . "</td>";
                    echo "<td>" . $list->getFECHAAJUSTE() . "</td>";
                    echo "<td>" . $list->getCANTIDAD() . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "no se ha cargado datos";
            }
            ?>
        </table>
        <br>
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
