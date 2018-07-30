<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    include_once 'https://frozen-lake-68964.herokuapp.com/model/Model.php';
    if(isset($_SESSION['userinventario'])){
        $USER= unserialize($_SESSION['userinventario']);
        $ROL=$USER->getROL();    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div ALIGN="CENTER">
        <h1>INVENTARIO</h1>
        
        <h2><?php echo "USUARIO ".$USER->getNOMBREBODEGUERO()?></h2>
        
        <?php
        if($ROL=="A"){
        ?>
        <a class="navbar-brand" href="../view/registroAdministrador.php">VER ADMINISTRADOR</a> 
        <br>
        <a class="navbar-brand" href="../view/registroBodeguero.php">VER BODEGUERO</a> 
        <br>
        <?php
        }
        ?>
        <a class="navbar-brand" href="../view/registroProducto.php">VER PRODUCTO</a> 
        <br>
        <a href="../controller/controller.php?opcion=salir">SALIR</a>  
        
        </div>
    </body>    
</html>
<?php
    }else{
        header("location: login.php");
    }
?>