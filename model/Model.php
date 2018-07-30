<?php

include_once 'https://frozen-lake-68964.herokuapp.com/model/Administrador.php';
include_once 'https://frozen-lake-68964.herokuapp.com/model/Producto.php';
include_once 'https://frozen-lake-68964.herokuapp.com/model/Database.php';
include_once 'https://frozen-lake-68964.herokuapp.com/model/Bodeguero.php';
include_once 'https://frozen-lake-68964.herokuapp.com/model/AjusteProducto.php';

class Model {

    public function getAdministradorObj($IDADMINISTRADOR) {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from administrador where IDADMINISTRADOR=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($IDADMINISTRADOR));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        if ($dato == null) {
            $user = null;
        } else {
            $user = new Administrador($dato['IDADMINISTRADOR'], $dato['CEDULA'], $dato['NOMBREADMINISTRADOR'], $dato['FECHANACIMIENTO'], $dato['CIUDADNACIMIENTO'], $dato['DIRECCION'], $dato['TELEFONO'], $dato['ESTADO'], $dato['ROL'], $dato['EMAIL'], $dato['PASSWORD']);
        }
        Database::disconnect();
        return $user;
    }

    public function getUSER($CEDULA, $PASSWORD) {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from bodeguero where CEDULA=? and PASSWORD=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($CEDULA, $PASSWORD));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        if ($dato == null) {
            $user = null;
        } else {
            $user = new Bodeguero($dato['IDBODEGUERO'], $dato['CEDULA'], $dato['NOMBREBODEGUERO'], $dato['FECHANACIMIENTO'], $dato['CIUDADNACIMIENTO'], $dato['DIRECCION'], $dato['TELEFONO'], $dato['ESTADO'], $dato['ROL'], $dato['EMAIL'], $dato['PASSWORD']);
        }
        Database::disconnect();
        return $user;
    }

    public function getAdministradores() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from administrador";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $dato) {
            $administrador = new Administrador($dato['IDADMINISTRADOR'], $dato['CEDULA'], $dato['NOMBREADMINISTRADOR'], $dato['FECHANACIMIENTO'], $dato['CIUDADNACIMIENTO'], $dato['DIRECCION'], $dato['TELEFONO'], $dato['ESTADO'], $dato['ROL'], $dato['EMAIL'], $dato['PASSWORD']);
            array_push($listado, $administrador);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function insertarAdministrador($CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $pdo = Database::connect();
        $sql = "insert into administrador(CEDULA, NOMBREADMINISTRADOR, FECHANACIMIENTO, CIUDADNACIMIENTO, DIRECCION, TELEFONO, ESTADO, ROL, EMAIL, PASSWORD) values(?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarAdministrador($IDADMINISTRADOR) {
        //preparamos la connexion en la bdd
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from administrador where IDADMINISTRADOR=?";
        $consulta = $pdo->prepare($sql);
        //exeutamos la sentencia ncluyendo los parametros
        $consulta->execute(array($IDADMINISTRADOR));
        Database::disconnect();
    }

    public function editarAdministrador($IDADMINISTRADOR, $CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $pdo = Database::connect();
        $sql = "update administrador set CEDULA=?, NOMBREADMINISTRADOR=?, FECHANACIMIENTO=?, CIUDADNACIMIENTO=?, DIRECCION=?, TELEFONO=?, ESTADO=?, ROL=?, EMAIL=?, PASSWORD=?  where IDADMINISTRADOR=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD, $IDADMINISTRADOR));
        Database::disconnect();
    }

    public function getpProducto($IDPRODUCTO) {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from producto where IDPRODUCTO=? ";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($IDPRODUCTO));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        if ($dato == null) {
            $producto = null;
        } else {
            $producto = new Producto($dato['IDPRODUCTO'], $dato['CODIGO'], $dato['NOMBREPRODUCTO'], $dato['DESCRIPCION'], $dato['IVA'], $dato['COSTO'], $dato['PVP'], $dato['ESTADO'], $dato['STOCK']);
        }
        Database::disconnect();
        return $producto;
    }

    public function getProductos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from producto";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
        $listado = array();
        foreach ($resultado as $dato) {
            $producto = new Producto($dato['IDPRODUCTO'], $dato['CODIGO'], $dato['NOMBREPRODUCTO'], $dato['DESCRIPCION'], $dato['IVA'], $dato['COSTO'], $dato['PVP'], $dato['ESTADO'], $dato['STOCK']);
            array_push($listado, $producto);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    public function getProductosWS() {
        $pdo = Database::connect();
        $sql = "select * from producto";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Factura:
//        $listado = array();
//        foreach ($resultado as $dato) {
//            $producto = new Producto($dato['IDPRODUCTO'], $dato['CODIGO'], $dato['NOMBREPRODUCTO'], $dato['DESCRIPCION'], $dato['IVA'], $dato['COSTO'], $dato['PVP'], $dato['ESTADO']);
//            array_push($listado, $producto);
//        }
        Database::disconnect();
        //return $listado;
        return json_encode($resultado);
    }

    public function insertarProducto($CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK) {
        $pdo = Database::connect();
        $sql = "insert into producto(CODIGO, NOMBREPRODUCTO, DESCRIPCION, IVA, COSTO, PVP, ESTADO, STOCK) values(?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarProducto($IDPRODUCTO) {
        //preparamos la connexion en la bdd
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from producto where IDPRODUCTO=?";
        $consulta = $pdo->prepare($sql);
        //exeutamos la sentencia ncluyendo los parametros
        $consulta->execute(array($IDPRODUCTO));
        Database::disconnect();
    }

    public function editarProducto($IDPRODUCTO, $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK) {
        $pdo = Database::connect();
        $sql = "update producto set CODIGO=?, NOMBREPRODUCTO=?, DESCRIPCION=?, IVA=?, COSTO=?, PVP=?, ESTADO=?, STOCK=? where IDPRODUCTO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK, $IDPRODUCTO));
        Database::disconnect();
    }

    public function obtenerPVP($IVA, $COSTO) {
        $pvp = $COSTO;
        if ($IVA == "S") {
            $pvp = ($COSTO * 0.12) + $COSTO;
        }
        return $pvp;
    }

    public function getBodeguero($IDBODEGUERO) {
        $pdo = Database::connect();
        $sql = "select * from bodeguero where IDBODEGUERO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($IDBODEGUERO));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($dato == null) {
            $user = null;
        } else {
            $user = new Bodeguero($dato['IDBODEGUERO'], $dato['CEDULA'], $dato['NOMBREBODEGUERO'], $dato['FECHANACIMIENTO'], $dato['CIUDADNACIMIENTO'], $dato['DIRECCION'], $dato['TELEFONO'], $dato['ESTADO'], $dato['ROL'], $dato['EMAIL'], $dato['PASSWORD']);
        }
        Database::disconnect();
        return $user;
    }

    public function getBodegueros() {
        $pdo = Database::connect();
        $sql = "select * from bodeguero";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $bodeguero = new Bodeguero($dato['IDBODEGUERO'], $dato['CEDULA'], $dato['NOMBREBODEGUERO'], $dato['FECHANACIMIENTO'], $dato['CIUDADNACIMIENTO'], $dato['DIRECCION'], $dato['TELEFONO'], $dato['ESTADO'], $dato['ROL'], $dato['EMAIL'], $dato['PASSWORD']);
            array_push($listado, $bodeguero);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarBodeguero($CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $pdo = Database::connect();
        $sql = "insert into bodeguero(CEDULA, NOMBREBODEGUERO, FECHANACIMIENTO, CIUDADNACIMIENTO, DIRECCION, TELEFONO, ESTADO, ROL, EMAIL, PASSWORD) values(?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarBodeguero($IDBODEGUERO) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from bodeguero where IDBODEGUERO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($IDBODEGUERO));
        Database::disconnect();
    }

    public function editarBodeguero($IDBODEGUERO, $CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $pdo = Database::connect();
        $sql = "update bodeguero set CEDULA=?, NOMBREBODEGUERO=?, FECHANACIMIENTO=?, CIUDADNACIMIENTO=?, DIRECCION=?, TELEFONO=?, ESTADO=?, ROL=?, EMAIL=?, PASSWORD=?  where IDBODEGUERO=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD, $IDBODEGUERO));
        Database::disconnect();
    }

    public function getAjuste($IDAJUSTE) {
        $pdo = Database::connect();
        $sql = "select * from ajusteproducto where IDAJUSTE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($IDAJUSTE));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($dato == null) {
            $ajuste = null;
        } else {
            $ajuste = new AjusteProducto($dato['IDAJUSTE'], $dato['IDPRODUCTO'], $dato['NUMEROAJUSTE'], $dato['CABECERA'], $dato['FECHAAJUSTE'], $dato['DETALLE'], $dato['CANTIDAD']);
        }
        Database::disconnect();
        return $ajuste;
    }

    public function getAjustes() {
        $pdo = Database::connect();
        $sql = "select * from ajusteproducto";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $ajustes = new AjusteProducto($dato['IDAJUSTE'], $dato['IDPRODUCTO'], $dato['NUMEROAJUSTE'], $dato['CABECERA'], $dato['FECHAAJUSTE'], $dato['DETALLE'], $dato['CANTIDAD']);
            array_push($listado, $ajustes);
        }
        Database::disconnect();
        return $listado;
    }

    public function getAjustesProducto($IDPRODUCTO) {
        $pdo = Database::connect();
        $sql = "select * from ajusteproducto where IDPRODUCTO=$IDPRODUCTO";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $ajustes = new AjusteProducto($dato['IDAJUSTE'], $dato['IDPRODUCTO'], $dato['NUMEROAJUSTE'], $dato['CABECERA'], $dato['FECHAAJUSTE'], $dato['DETALLE'], $dato['CANTIDAD']);
            array_push($listado, $ajustes);
        }
        Database::disconnect();
        return $listado;
    }
    
    public function getAjustePorRango($FECHAINICIO, $FECHAFIN){
        $pdo = Database::connect();
        $sql = "select * from ajusteproducto where FECHAAJUSTE between '$FECHAINICIO' AND '$FECHAFIN' ";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $ajustes = new AjusteProducto($dato['IDAJUSTE'], $dato['IDPRODUCTO'], $dato['NUMEROAJUSTE'], $dato['CABECERA'], $dato['FECHAAJUSTE'], $dato['DETALLE'], $dato['CANTIDAD']);
            array_push($listado, $ajustes);
        }
        Database::disconnect();
        return $listado;
    }

    public function insertarAjuste($IDPRODUCTO, $CABECERA, $FECHAAJUSTE, $DETALLE, $CANTIDAD) {
        $pdo = Database::connect();
        $sql = "insert into ajusteproducto(IDPRODUCTO, NUMEROAJUSTE, CABECERA, FECHAAJUSTE, DETALLE, CANTIDAD) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        $NUMEROAJUSTE = $this->getNumeroAjuste();
        $num = $NUMEROAJUSTE + 1;
        $numero = "AJUS-" . $num;
        $val = $this->editarStock($IDPRODUCTO, $CABECERA, $CANTIDAD);
        if ($val == 0) {
            $mensaje = "EL STOCK ES INSUFICIENTE";
            $_SESSION['mensaje'] = $mensaje;
        } else {
            try {
                $consulta->execute(array($IDPRODUCTO, $numero, $CABECERA, $FECHAAJUSTE, $DETALLE, $CANTIDAD));
            } catch (PDOException $e) {
                Database::disconnect();
                throw new Exception($e->getMessage());
            }
            $mensaje = "";
            $_SESSION['mensaje'] = $mensaje;
        }
        Database::disconnect();
    }

    public function eliminarAjuste($IDAJUSTE) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from ajusteproducto where IDAJUSTE=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($IDAJUSTE));
        Database::disconnect();
    }

    public function getNumeroAjuste() {
        $lista = $this->getAjustes();
        $cont = 0;
        foreach ($lista as $list) {
            $cont++;
        }
        return $cont;
    }

    public function editarStock($IDPRODUCTO, $CABECERA, $CANTIDAD) {
        $pdo = Database::connect();
        $producto = $this->getpProducto($IDPRODUCTO);
        echo $num = $producto->getSTOCK();
        if ($CABECERA == "ENTRADA") {
            echo $STOCK = $num + $CANTIDAD;
            $sql = "update producto set STOCK=? where IDPRODUCTO=?";
            $consulta = $pdo->prepare($sql);
            $consulta->execute(array($STOCK, $IDPRODUCTO));
            return 1;
        }
        if ($CABECERA == "SALIDA") {
            if ($CANTIDAD < $num) {
                echo $STOCK = $num - $CANTIDAD;
                $sql = "update producto set STOCK=? where IDPRODUCTO=?";
                $consulta = $pdo->prepare($sql);
                $consulta->execute(array($STOCK, $IDPRODUCTO));
                return 1;
            } else {
                return 0;
            }
        }
        Database::disconnect();
    }

}
