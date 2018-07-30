<!DOCTYPE html>
<?php
require_once '../model/Producto.php';
require_once '../model/Model.php';

session_start();
echo $mensaje = "";
$_SESSION['mensaje'] = $mensaje;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-1.4.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div align="center">
            <div class="container"> 
                <div class="page-header">
                    <h1>BIENVENIDO AL REGISTRO DE PRODUCTOS</h1>      
                </div>
                <p>Llenar todos los campos :)</p>  
            </div>
            <br>
            <form action="../controller/controller.php">
                <table>
                    <input type="hidden" name="opcion" value="registrar_producto">       

                    <!--  $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO -->
                    <tr>
                        <td>Código</td>
                        <td><input type="text" name="CODIGO" placeholder=""  class="form-control"  required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Nombre del Producto</td>
                        <td><input type="text" name="NOMBREPRODUCTO" placeholder=""  class="form-control" required="true"></td>
                    </tr>

                    <tr>
                        <td>Descripción</td>
                        <td><input type="text" name="DESCRIPCION" placeholder=""  class="form-control" required="true"></td>
                    </tr>

                    <tr>
                        <td>IVA</td>
                        <td>
                            <select name="IVA" required="true">
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Costo</td>
                        <td><input type="text" name="COSTO" placeholder=""  class="form-control" required="true"></td>                    
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>
                            <select name="ESTADO" required="true">
                                <option value="A">ACTIVO</option>
                                <option value="I">INACTIVO</option>
                            </select>
                        </td>                  
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td><input type="number" min="0" name="STOCK" placeholder=""  class="form-control" required="true"></td>
                    </tr>
                    <tr>
                        <td>
                            <br>      
                            <div class="alert alert-success"> 
                                <!--<strong>Success!</strong> You should <a href="#" class="alert-link">read this message</a>.-->
                                <input type="submit" value="REGISTRAR" class="btn btn-success" class="alert-link">
                            </div>
                        </td>
                    </tr>
                </table>        
            </form>
            <br>
            <form action="../controller/controller.php">
                <input type="hidden" value="registro" name="opcion">
                <table>
                    <tr>                                        
                        <td><input type="submit" value="REGISTRO DE AJUSTES" class="btn btn-info"></td>                        
                    </tr>
                </table>
            </form>
            <br>
        </div>
    <center>   
        <form action="../controller/controller.php">
            <input type="hidden" value="listar_producto" name="opcion">
            <input type="submit" value="LISTA PRODUCTOS" class="btn btn-info">
        </form>
        <br>
        <br>
        <table border = 4 >
            <caption>
            </caption>
            <tr>
                <!--  $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO -->
                <th>ID PRODUCTO</th>
                <th>CODIGO</th>
                <th>NOMBRES</th>
                <th>DESCRIPCION</th>
                <th>IVA</th>
                <th>COSTO</th>
                <th>PVP</th>
                <th>ESTADO</th>
                <th>STOCK</th>
                <th COLSPAN="3">OPCIONES</th>   
            </tr>
            <?php
            // verifica si existe ens sesion el verificado de productos
            if (isset($_SESSION['listadoProductos'])) {
                $listado = unserialize($_SESSION['listadoProductos']);
                foreach ($listado as $list) {
                    echo "<tr>";
                    echo "<td>" . $list->getIDPRODUCTO() . "</td>";
                    echo "<td>" . $list->getCODIGO() . "</td>";
                    echo "<td>" . $list->getNOMBREPRODUCTO() . "</td>";
                    echo "<td>" . $list->getDESCRIPCION() . "</td>";
                    echo "<td>" . $list->getIVA() . "</td>";
                    echo "<td>" . $list->getCOSTO() . "</td>";
                    echo "<td>" . $list->getPVP() . "</td>";
                    echo "<td>" . $list->getESTADO() . "</td>";
                    echo "<td>" . $list->getSTOCK() . "</td>";
                    // opcion para invocar al contrlador indicando la opcion eliminar  o cargar 
                    // y la fila que selecciono el usuario como producto
                    echo "<td> <a href='../controller/controller.php?opcion=cargar_producto&IDPRODUCTO=" . $list->getIDPRODUCTO() . "'>editar</a></td>";
                    echo "<td> <a alert='cuidado' href='../controller/controller.php?opcion=eliminar_producto&IDPRODUCTO=" . $list->getIDPRODUCTO() . "'>eliminar</a></td>";
                    echo "<td> <a href='../controller/controller.php?opcion=ajuste&IDPRODUCTO=" . $list->getIDPRODUCTO() . "'>Ajuste del Producto</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "no se ha cargado datos";
            }
            ?>
        </table>
        <br>
        <form action="../view/index.php">
            <table>
                <tr>                                        
                    <td><input type="submit" value="VOLVER AL INICIO" class="btn btn-info"></td>                        
                </tr>
            </table>
        </form>
    </center>
</body>
</html>

