<!DOCTYPE html>
<?php
//    session_start();
//    include_once '../model/Model.php';
//    if(isset($_SESSION['user'])){
//        $USER= unserialize($_SESSION['user']);
//            $IDPRODUCTO, $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO
//?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h1>MODIFICACIÓN DEL PRODUCTO</h1>
        <br>
         <?php
        require_once '../model/Producto.php';
        session_start();
        $producto = $_SESSION['producto'];
        ?>
        <form action="../controller/controller.php">            
            <input type="hidden" value="editar_producto"  name="opcion">
            <input type="hidden" value="<?php echo $producto->getIDPRODUCTO(); ?>" name="IDPRODUCTO">
            CODIGO :<input type="text" name="CODIGO" value="<?php echo $producto->getCODIGO();?>"><br>
            NOMBRE :<input type="text" name="NOMBREPRODUCTO" value="<?php echo $producto->getNOMBREPRODUCTO();?>"><br>
            DESCRIPCION ::<input type="TEXT" name="DESCRIPCION" value="<?php echo $producto->getDESCRIPCION();?>"><br>
            IVA :<select name="IVA" required="true">
                                <option value="S">SI</option>
                                <option value="N">NO</option>
                            </select><br>
            COSTO :<input type="text" name="COSTO" value="<?php echo $producto->getCOSTO();?>"><br>
            ESTADO :<select name="ESTADO" required="true">
                                <option value="A">ACTIVO</option>
                                <option value="I">INACTIVO</option>
                            </select><br>
                            STOCK ::<input type="number" min="0" name="STOCK" value="<?php echo $producto->getSTOCK();?>"><br>
            <br>
            <br>
            <input type="submit" value="EDITAR">                                                
        </form>
     </center>   
    </body>
</html>
<?php
//    }else{
//        header("location: login.php");
//    }
?>