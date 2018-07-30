<!DOCTYPE html>
<?php
require_once '../model/Producto.php';
require_once '../model/Model.php';
session_start();
$producto = $_SESSION['producto'];
$model = new Model();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div align="center">
            <div class="container">
                <div class="page-header">
                    <h1>BIENVENIDO AL AJUSTE DEL PRODUCTO</h1>      
                </div>
                <p>Llenar todos los campos :)</p>      
            </div>
            <br>            
            <form action="../controller/controller.php">
                <table>
                    <input type="hidden" name="opcion" value="crear_ajuste">
                    <input type="hidden" value="<?php echo $producto->getIDPRODUCTO(); ?>" name="IDPRODUCTO">
                    <input type="hidden" value="<?php echo $producto->getNOMBREPRODUCTO(); ?>" name="DETALLE">
                    <tr>
                        <td>Detalle:</td>
                        <td><label><?php echo $producto->getNOMBREPRODUCTO(); ?></label></td>
                    </tr>
                    <tr>
                        <td>Stock:</td>
                        <td><label><?php echo $producto->getSTOCK(); ?></label></td>
                    </tr>
                    <tr>
                        <td>PVP:</td>
                        <td><label><?php echo $producto->getPVP(); ?></label></td>
                    </tr>
                    <tr>
                        <td>Registra IVA:</td>
                        <?php
                        if ($producto->getIVA() == "N") {
                            $valor = "No";
                        } else {
                            $valor = "Si";
                        }
                        ?>
                        <td><label><?php echo $valor; ?></label></td>
                    </tr>
                    <tr>
                        <td>Cabecera</td>
                        <td><select name="CABECERA" required="true">
                                <option value="ENTRADA">ENTRADA</option>
                                <option value="SALIDA">SALIDA</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Fecha del Ajuste</td>
                        <td><input type="date" name="FECHAAJUSTE" required="true"></td>
                    </tr>                    
                    <tr>
                        <td>Cantidad</td>
                        <td><input type="number" min="0" name="CANTIDAD" required="true"></td>                    
                    </tr>
                    <tr>
                        <td>
                            <br>      
                            <div class="alert alert-success"> 
                                <input type="submit" value="ENVIAR AJUSTE" class="btn btn-success" class="alert-link">
                            </div>
                        </td>
                    </tr>
                </table>        
            </form><br>
            <?php
            if (isset($_SESSION['mensaje'])) {
                $mensaje = $_SESSION['mensaje'];
                if ($mensaje == "EL STOCK ES INSUFICIENTE") {
                    echo $mensaje;
                }
            }
            ?>
            <br>            
            <form action="../controller/controller.php">
                <input type="hidden" value="listar_producto" name="opcion">
                <table>
                    <tr>                                        
                        <td><input type="submit" value="VOLVER A PRODUCTOS" class="btn btn-info"></td>                        
                    </tr>
                </table>
            </form>
            <br>  
            <form action="../controller/controller.php">
                <input type="hidden" value="listar_rango_ajuste" name="opcion">
                <table>
                    <h3>INGRESE UN RANGO</h3>
                    <td>Fecha de Inicio</td>
                    <td><input type="date" name="FECHAINICIO" required="true"></td>
                    <td>Fecha Fin</td>
                    <td><input type="date" name="FECHAFIN" required="true"></td>
                    <td><input type="submit" value="BUSCAR" class="btn btn-info"></td>
                </table>    
            </form>

            <form action="../controller/controller.php">
                <input type="hidden" value="listar_ajustes" name="opcion">
                <input type="submit" value="VER TODO" class="btn btn-info">
            </form>
            <br>
            <br>
            <table border = 4 >
                <caption>
                </caption>
                <tr>
                    <!--  $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO -->
                    <th>ID AJUSTE</th>
                    <th>ID PRODUCTO</th>
                    <th>DETALLE</th>
                    <th>NÚMERO DEL AJUSTE</th>
                    <th>CABECERA</th>
                    <th>FECHA DEL AJUSTE</th>                
                    <th>CANTIDAD</th>
                    <th colspan="2">OPCIONES</th>   
                </tr>
                <?php
                // verifica si existe ens sesion el verificado de productos
                if (isset($_SESSION['listadoAjustes'])) {
                    $listado = unserialize($_SESSION['listadoAjustes']);
                    foreach ($listado as $list) {
                        echo "<tr>";
                        echo "<td>" . $list->getIDAJUSTE() . "</td>";
                        echo "<td>" . $list->getIDPRODUCTO() . "</td>";
                        echo "<td>" . $list->getDETALLE() . "</td>";
                        echo "<td>" . $list->getNUMEROAJUSTE() . "</td>";
                        echo "<td>" . $list->getCABECERA() . "</td>";
                        echo "<td>" . $list->getFECHAAJUSTE() . "</td>";
                        echo "<td>" . $list->getCANTIDAD() . "</td>";
                        // opcion para invocar al contrlador indicando la opcion eliminar  o cargar 
                        // y la fila que selecciono el usuario como producto                    
                        echo "<td> <a alert='cuidado' href='../controller/controller.php?opcion=eliminar_ajuste&IDAJUSTE=" . $list->getIDAJUSTE() . "'>eliminar</a></td>";
                        echo "<td> <a href='../controller/controller.php?opcion=imprimir&IDAJUSTE=" . $list->getIDAJUSTE() . "'>imprimir</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "no se ha cargado datos";
                }
                ?>
            </table>
        </div>
        <br>    
    </body>
</html>
