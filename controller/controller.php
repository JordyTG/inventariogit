<?php

require_once '../model/Model.php';
require_once '../model/Database.php';
session_start();
$gmodel = new Model();
$opcion = $_REQUEST['opcion'];
switch ($opcion) {
    case "Entrar":
        $USER = $_REQUEST['user'];
        $PASSWORD = $_REQUEST['password'];
        $USUARIO = $gmodel->getUSER($USER, $PASSWORD);
        if (isset($USUARIO)) {
            if (isset($_SESSION['msj'])) {
                unset($_SESSION['msj']);
            }    
            $_SESSION['userinventario'] = serialize($USUARIO);
            header('Location: ../view/index.php');
        } else {
            $_SESSION['msj'] = "Usuario No Encontrado";
            header('Location: ../view/login.php');
        }
        break;
    //---------------------------

    case "listar_administrador":
        //obtenemos el listado de los integrantes
        $listado = $gmodel->getAdministradores();
        // y los guardamos en sesion:
        $_SESSION['listadoAdministrador'] = serialize($listado);
        header('Location: ../view/registroAdministrador.php');
        break;

    case "cargar_administrador":
        $IDADMINISTRADOR = $_REQUEST['IDADMINISTRADOR'];
        $bodeguero = $gmodel->getAdministradorObj($IDADMINISTRADOR);
        $_SESSION['administrador'] = $bodeguero;
        header('Location: ../view/editarAdministrador.php');
        break;

    case "registrar_administrador":
        //CEDULA NOMBREADMINISTRADOR FECHANACIMIENTO CIUDADNACIMIENTO DIRECCION TELEFONO  ESTADO ROL EMAIL PASSWORD

        $CEDULA = $_REQUEST['CEDULA'];
        $NOMBREADMINISTRADOR = $_REQUEST['NOMBREADMINISTRADOR'];
        $FECHANACIMIENTO = $_REQUEST['FECHANACIMIENTO'];
        $CIUDADNACIMIENTO = $_REQUEST['CIUDADNACIMIENTO'];
        $DIRECCION = $_REQUEST['DIRECCION'];
        $TELEFONO = $_REQUEST['TELEFONO'];
        $ESTADO = $_REQUEST['ESTADO'];
        $ROL = $_REQUEST['ROL'];
        $EMAIL = $_REQUEST['EMAIL'];
        $PASSWORD = $_REQUEST['PASSWORD'];
        $gmodel->insertarAdministrador($CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD);
        $listado = $gmodel->getAdministradores();
        $_SESSION['listadoAdministrador'] = serialize($listado);
        header('Location: ../view/registroAdministrador.php');
        break;

    case "eliminar_administrador":
        $IDADMINISTRADOR = $_REQUEST['IDADMINISTRADOR'];
        $gmodel->eliminarAdministrador($IDADMINISTRADOR);
        $listado = $gmodel->getAdministradores();
        $_SESSION['listadoAdministrador'] = serialize($listado);
        header('Location: ../view/registroAdministrador.php');
        break;

    case "editar_administrador":
        $IDADMINISTRADOR = $_REQUEST['IDADMINISTRADOR'];
        $CEDULA = $_REQUEST['CEDULA'];
        $NOMBREADMINISTRADOR = $_REQUEST['NOMBREADMINISTRADOR'];
        $FECHANACIMIENTO = $_REQUEST['FECHANACIMIENTO'];
        $CIUDADNACIMIENTO = $_REQUEST['CIUDADNACIMIENTO'];
        $DIRECCION = $_REQUEST['DIRECCION'];
        $TELEFONO = $_REQUEST['TELEFONO'];
        $ESTADO = $_REQUEST['ESTADO'];
        $ROL = $_REQUEST['ROL'];
        $EMAIL = $_REQUEST['EMAIL'];
        $PASSWORD = $_REQUEST['PASSWORD'];
        $gmodel->editarAdministrador($IDADMINISTRADOR, $CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD);
        $listado = $gmodel->getAdministradores();
        $_SESSION['listadoAdministrador'] = serialize($listado);
        header('Location: ../view/registroAdministrador.php');
        break;
    case "listar_producto":
        //obtenemos el listado de los integrantes
        $listadoProductos = $gmodel->getProductos();
        // y los guardamos en sesion:
        $_SESSION['listadoProductos'] = serialize($listadoProductos);
        header('Location: ../view/registroProducto.php');
        break;
    case "cargar_producto":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $producto = $gmodel->getpProducto($IDPRODUCTO);
        $_SESSION['producto'] = $producto;
        header('Location: ../view/editarProducto.php');
        break;
    case "registrar_producto":
        //$IDPRODUCTO, $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO
        $CODIGO = $_REQUEST['CODIGO'];
        $NOMBREPRODUCTO = $_REQUEST['NOMBREPRODUCTO'];
        $DESCRIPCION = $_REQUEST['DESCRIPCION'];
        $IVA = $_REQUEST['IVA'];
        $COSTO = $_REQUEST['COSTO'];
        $PVP = $gmodel->obtenerPVP($IVA, $COSTO);
        $ESTADO = $_REQUEST['ESTADO'];
        $STOCK = $_REQUEST['STOCK'];
        $gmodel->insertarProducto($CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO,$STOCK);
        header('Location: ../view/registroProducto.php');
        break;
    case "eliminar_producto":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $gmodel->eliminarProducto($IDPRODUCTO);
        $listadoProductos = $gmodel->getProductos();
        $_SESSION['listadoProductos'] = serialize($listadoProductos);
        header('Location: ../view/registroProducto.php');
        break;
    case "editar_producto":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $CODIGO = $_REQUEST['CODIGO'];
        $NOMBREPRODUCTO = $_REQUEST['NOMBREPRODUCTO'];
        $DESCRIPCION = $_REQUEST['DESCRIPCION'];
        $IVA = $_REQUEST['IVA'];
        $COSTO = $_REQUEST['COSTO'];
        $PVP = $gmodel->obtenerPVP($IVA, $COSTO);
        $ESTADO = $_REQUEST['ESTADO'];
        $STOCK = $_REQUEST['STOCK'];
        $gmodel->editarProducto($IDPRODUCTO, $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO,$STOCK);
        $listadoProductos = $gmodel->getProductos();
        $_SESSION['listadoProductos'] = serialize($listadoProductos);
        header('Location: ../view/registroProducto.php');
        break;
    case "listar_bodeguero":
        $listado = $gmodel->getBodegueros();
        $_SESSION['listadoBodeguero'] = serialize($listado);
        header('Location: ../view/registroBodeguero.php');
        break;
    case "cargar_bodeguero":
        $IDBODEGUERO = $_REQUEST['IDBODEGUERO'];
        $bodeguero = $gmodel->getBodeguero($IDBODEGUERO);
        $_SESSION['bodeguero'] = $bodeguero;
        header('Location: ../view/editarBodeguero.php');
        break;
    case "registrar_bodeguero":
        $CEDULA = $_REQUEST['CEDULA'];
        $NOMBREBODEGUERO = $_REQUEST['NOMBREBODEGUERO'];
        $FECHANACIMIENTO = $_REQUEST['FECHANACIMIENTO'];
        $CIUDADNACIMIENTO = $_REQUEST['CIUDADNACIMIENTO'];
        $DIRECCION = $_REQUEST['DIRECCION'];
        $TELEFONO = $_REQUEST['TELEFONO']; 
        $ESTADO = $_REQUEST['ESTADO'];
        $ROL = $_REQUEST['ROL'];
        $EMAIL = $_REQUEST['EMAIL'];
        $PASSWORD = $_REQUEST['PASSWORD'];
        $gmodel->insertarBodeguero($CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD);
        $listado =$gmodel->getBodegueros();
        $_SESSION['listadoBodeguero'] = serialize($listado);
        header('Location: ../view/registroBodeguero.php');
        break;

    case "eliminar_bodeguero":
        $IDBODEGUERO = $_REQUEST['IDBODEGUERO'];
        $gmodel->eliminarBodeguero($IDBODEGUERO);
        $listado = $gmodel->getBodegueros();
        $_SESSION['listadoBodeguero'] = serialize($listado);
        header('Location: ../view/registroBodeguero.php');
        break;

    case "editar_bodeguero":
        $IDBODEGUERO = $_REQUEST['IDBODEGUERO'];
        $CEDULA = $_REQUEST['CEDULA'];
        $NOMBREBODEGUERO = $_REQUEST['NOMBREBODEGUERO'];
        $FECHANACIMIENTO = $_REQUEST['FECHANACIMIENTO'];
        $CIUDADNACIMIENTO = $_REQUEST['CIUDADNACIMIENTO'];
        $DIRECCION = $_REQUEST['DIRECCION'];
        $TELEFONO = $_REQUEST['TELEFONO'];
        $ESTADO = $_REQUEST['ESTADO'];
        $ROL = $_REQUEST['ROL'];
        $EMAIL = $_REQUEST['EMAIL'];
        $PASSWORD = $_REQUEST['PASSWORD'];
        $gmodel->editarBodeguero($IDBODEGUERO, $CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD);
        $listado = $gmodel->getBodegueros();
        $_SESSION['listadoBodeguero'] = serialize($listado);
        header('Location: ../view/registroBodeguero.php');
        break;
    //--------------Ajuste----------------------------
    case "ajuste":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $producto = $gmodel->getpProducto($IDPRODUCTO);
        $_SESSION['producto'] = $producto;
        header('Location: ../view/ajustarProducto.php');
        break;
    case "crear_ajuste":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $CABECERA = $_REQUEST['CABECERA'];
        $FECHAAJUSTE = $_REQUEST['FECHAAJUSTE'];
        $DETALLE = $_REQUEST['DETALLE'];
        $CANTIDAD = $_REQUEST['CANTIDAD']; 
        $gmodel->insertarAjuste($IDPRODUCTO, $CABECERA, $FECHAAJUSTE, $DETALLE, $CANTIDAD);
        $listado =$gmodel->getAjustes();
        $_SESSION['listadoAjustes'] = serialize($listado);
        header('Location: ../view/ajustarProducto.php');
        break;
    case "imprimir":
        $IDAJUSTE = $_REQUEST['IDAJUSTE'];
        $ajuste = $gmodel->getAjuste($IDAJUSTE);
        $_SESSION['ajuste'] = $ajuste;
        header('Location: ../view/imprimirAjuste.php');
        break;
    case "eliminar_ajuste":
        $IDAJUSTE = $_REQUEST['IDAJUSTE'];
        $gmodel->eliminarAjuste($IDAJUSTE);
        $listado = $gmodel->getAjustes();
        $_SESSION['listadoAjustes'] = serialize($listado);
        header('Location: ../view/ajustarProducto.php');
        break;
    case "listar_ajustes":
        $listado = $gmodel->getAjustes();
        $_SESSION['listadoAjustes'] = serialize($listado);
        header('Location: ../view/ajustarProducto.php');
        break;
    case "salir":
        unset($_SESSION['userinventario']);
        header('Location: ../view/index.php');
        break;
    case "registro":
        $listado = $gmodel->getProductos();
        $_SESSION['listadoProductos'] = serialize($listado);
        header('Location: ../view/registroAjustes.php');
        break;
    case "listarAjustesProducto":
        $IDPRODUCTO = $_REQUEST['IDPRODUCTO'];
        $listado = $gmodel->getAjustesProducto($IDPRODUCTO);
        $_SESSION['listadoAjust'] = serialize($listado);
        header('Location: ../view/registroAjustes.php');
        break; 
    case "listar_rango_ajuste":
        echo $FECHAINICIO = $_REQUEST['FECHAINICIO'];
        echo $FECHAFIN = $_REQUEST['FECHAFIN'];
        echo $listado = $gmodel->getAjustePorRango($FECHAINICIO, $FECHAFIN);
        $_SESSION['listadoAjustes'] = serialize($listado);
        header('Location: ../view/ajustarProducto.php');
        break;
    default:
        header('Location: ../view/index.php');
}

