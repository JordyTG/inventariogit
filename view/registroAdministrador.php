<!DOCTYPE html>
<?php
require_once '../model/Administrador.php';
require_once '../model/Model.php';

session_start();

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
                    <h1>BIENVENIDO AL REGISTRO DE ADMINSTRADOR</h1>      
                </div>
                <p>Llenar todos los campos :)</p>      

            </div>
            <br>
            
            <form action="../controller/controller.php">
                <table>
                    <input type="hidden" name="opcion" value="registrar_administrador">       
                    
                    <!--  CEDULA NOMBREADMINISTRADOR FECHANACIMIENTO CIUDADNACIMIENTO DIRECCION TELEFONO  ESTADO ROL EMAIL PASSWORD -->
                    <tr>
                        <td>Cedula</td>
                        <td><input type="text" name="CEDULA" placeholder=""  class="form-control"  required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Nombre</td>
                        <td><input type="text" name="NOMBREADMINISTRADOR" placeholder=""  class="form-control" required="true"></td>
                    </tr>

                    <tr>
                        <td>Fecha Nacimiento</td>
                        <td><input type="date" name="FECHANACIMIENTO" required="true" autocomplete="off" required="" value=""></td>                        
                    </tr>

                    <tr>
                        <td>Ciudad de Nacmineto</td>
                        <td><input type="text" name="CIUDADNACIMIENTO" placeholder="Ibarra"   class="form-control" required="true"></td>
                    </tr>

                    <tr>
                        <td>Dirección</td>
                        <td><input type="text" name="DIRECCION" placeholder=""  class="form-control" required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Telefono</td>
                        <td><input type="text" name="TELEFONO" placeholder="" class="form-control" required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Estado</td>
                        <td><input type="text" name="ESTADO" placeholder="A"  class="form-control"  required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Rol</td>
                        <td><input type="text" name="ROL" placeholder="A"  class="form-control"  required="true"></td>                    
                    </tr>                    

                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="EMAIL" placeholder="@utn.edu.ec"  class="form-control"  required="true"></td>                    
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="PASSWORD" placeholder="******" class="form-control"  required="true"></td>
                    </tr>

                    <tr>
                        <td>
                            <br>      
                            <div class="alert alert-success">
                                <!--<strong>Success!</strong> You should <a href="#" class="alert-link">read this message</a>.-->
                                <input type="submit" value="REGISTRAR" class="btn btn-success" class="alert-link">
                            </div>
                        </td>
                        <td>

                    </tr> 

                </table>        
            </form>
            <br>
            <br>
                
        </div>
        <br>
     <center>   
        <form action="../controller/controller.php">
            <input type="hidden" value="listar_administrador" name="opcion">
            <input type="submit" value="LISTA ADMINISTRADORES" class="btn btn-info">
        </form>
         <br>
         <br>
    
        <table border = 4 >
            <caption>

            </caption>
            <tr>
                <th>ID ADMINISTRADOR</th>
                <th>CEDULA</th>
                <th>NOMBRES</th>
                <th>FECHA NACIMIENTO</th>
                <th>CIUDAD</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>ESTADO</th>
                <th>ROL</th>                
                <th>CORREO</th>
                <th>PASSWORD</th>
                <th COLSPAN="2">OPCIONES</th>   

            </tr>
            
            
            <?php
            
            // verifica si existe ens sesion el verificado de productos
            if (isset($_SESSION['listadoAdministrador'])) {
                $listado = unserialize($_SESSION['listadoAdministrador']);
                foreach ($listado as $list) {
                    echo "<tr>";
                    echo "<td>" . $list->getIDADMINISTRADOR() . "</td>";
                    echo "<td>" . $list->getCEDULA() . "</td>";
                    echo "<td>" . $list->getNOMBREADMINISTRADOR() . "</td>";
                    echo "<td>" . $list->getFECHANACIMIENTO() . "</td>";
                    echo "<td>" . $list->getCIUDADNACIMIENTO() . "</td>";
                    echo "<td>" . $list->getDIRECCION() . "</td>";
                    echo "<td>" . $list->getTELEFONO() . "</td>";
                    echo "<td>" . $list->getESTADO() . "</td>";
                    echo "<td>" . $list->getROL() . "</td>";
                    echo "<td>" . $list->getEMAIL() . "</td>";
                    echo "<td>" . $list->getPASSWORD() . "</td>";
                    // opcion para invocar al contrlador indicando la opcion eliminar  o cargar 
                    // y la fila que selecciono el usuario como producto
                    echo "<td> <a href='../controller/controller.php?opcion=cargar_administrador&IDADMINISTRADOR=" . $list->getIDADMINISTRADOR() . "'>editar</a></td>";
                    echo "<td> <a alert='cuidado' href='../controller/controller.php?opcion=eliminar_administrador&IDADMINISTRADOR=" . $list->getIDADMINISTRADOR() . "'>eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "no se ha cargado datos";
            }
            ?>

        </table>
         <br>
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
