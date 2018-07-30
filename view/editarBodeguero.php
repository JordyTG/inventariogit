<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h1>MODIFICACIÓN DEL BODEGUERO</h1>
        <br>
         <?php
        include_once '../model/Bodeguero.php';
        session_start();
        $bodeguero = $_SESSION['bodeguero'];
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" value="editar_bodeguero"  name="opcion">
            <input type="hidden" value="<?php echo $bodeguero->getIDBODEGUERO(); ?>" name="IDBODEGUERO">
            ID BODEGUERO :<b><?php echo $bodeguero->getIDBODEGUERO();?></b><br>
            CEDULA :<input type="text" name="CEDULA" value="<?php echo $bodeguero->getCEDULA();?>"><br>
            NOMBRE :<input type="text" name="NOMBREBODEGUERO" value="<?php echo $bodeguero->getNOMBREBODEGUERO();?>"><br>
            FECHA :<input type="date" name="FECHANACIMIENTO" value="<?php echo $bodeguero->getFECHANACIMIENTO();?>"><br>
            CIUDAD :<input type="text" name="CIUDADNACIMIENTO" value="<?php echo $bodeguero->getCIUDADNACIMIENTO();?>"><br>
            DIRECCION :<input type="text" name="DIRECCION" value="<?php echo $bodeguero->getDIRECCION();?>"><br>
            TELEFONO :<input type="number" name="TELEFONO" value="<?php echo $bodeguero->getTELEFONO();?>"><br>
            ESTADO :<input type="text" name="ESTADO" value="<?php echo $bodeguero->getESTADO();?>"><br>
            ROL :<input type="text" name="ROL" value="<?php echo $bodeguero->getROL();?>"><br>
            EMAIL :<input type="email" name="EMAIL" value="<?php echo $bodeguero->getEMAIL();?>"><br>
            PASSWORD :<input type="password" name="PASSWORD" value="<?php echo $bodeguero->getPASSWORD();?>"><br>                        
            <br>
            <br>
            <input type="submit" value="EDITAR">                                                
        </form>
     </center>   
    </body>
</html>
