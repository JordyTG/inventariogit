<!DOCTYPE html>
<?php
//    session_start();
//    include_once '../model/Model.php';
//    if(isset($_SESSION['user'])){
//        $USER= unserialize($_SESSION['user']);
//            
//?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h1>MODIFICACIÓN DEL ADMINISTRADOR</h1>
        <br>
         <?php
        include_once '../model/Administrador.php';
        session_start();
        $bodeguero = $_SESSION['administrador'];
        ?>
        <form action="../controller/controller.php">

            <input type="hidden" value="editar_administrador"  name="opcion">
            <input type="hidden" value="<?php echo $bodeguero->getIDADMINISTRADOR(); ?>" name="IDADMINISTRADOR">
            ID ADMINISTRADOR :<b><?php echo $bodeguero->getIDADMINISTRADOR();?></b><br>
            CEDULA :<input type="text" name="CEDULA" value="<?php echo $bodeguero->getCEDULA();?>"><br>
            NOMBRE :<input type="text" name="NOMBREADMINISTRADOR" value="<?php echo $bodeguero->getNOMBREADMINISTRADOR();?>"><br>
            FECHA ::<input type="date" name="FECHANACIMIENTO" value="<?php echo $bodeguero->getFECHANACIMIENTO();?>"><br>
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
<?php
//    }else{
//        header("location: login.php");
//    }
?>