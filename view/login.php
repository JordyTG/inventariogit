<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div align="center">
        <?php
        session_start();
        if(isset($_SESSION['msj'])){
            echo $_SESSION['msj'];
        }
        ?>
        <form action="../controller/controller.php">
            <input type="text" name="user" value="" placeholder="Usuario"></br>
            <input type="password" name="password" value="" placeholder="Password"></br>
            <input type="submit" name="opcion" value="Entrar">
        </form>
        </div>
    </body>
</html>
