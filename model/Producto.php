<?php
/**
 * Description of Producto
 *
 * @author JOSE VELASCO
 */
class Producto {
    private $IDPRODUCTO,$CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK;
    
    function __construct($IDPRODUCTO, $CODIGO, $NOMBREPRODUCTO, $DESCRIPCION, $IVA, $COSTO, $PVP, $ESTADO, $STOCK) {
        $this->IDPRODUCTO = $IDPRODUCTO;
        $this->CODIGO = $CODIGO;
        $this->NOMBREPRODUCTO = $NOMBREPRODUCTO;
        $this->DESCRIPCION = $DESCRIPCION;
        $this->IVA = $IVA;
        $this->COSTO = $COSTO;
        $this->PVP = $PVP;
        $this->ESTADO = $ESTADO;
        $this->STOCK = $STOCK;
    }

    function getIDPRODUCTO() {
        return $this->IDPRODUCTO;
    }

    function getCODIGO() {
        return $this->CODIGO;
    }

    function getNOMBREPRODUCTO() {
        return $this->NOMBREPRODUCTO;
    }

    function getDESCRIPCION() {
        return $this->DESCRIPCION;
    }

    function getIVA() {
        return $this->IVA;
    }

    function getCOSTO() {
        return $this->COSTO;
    }

    function getPVP() {
        return $this->PVP;
    }

    function getESTADO() {
        return $this->ESTADO;
    }

    function getSTOCK() {
        return $this->STOCK;
    }

    function setIDPRODUCTO($IDPRODUCTO) {
        $this->IDPRODUCTO = $IDPRODUCTO;
    }

    function setCODIGO($CODIGO) {
        $this->CODIGO = $CODIGO;
    }

    function setNOMBREPRODUCTO($NOMBREPRODUCTO) {
        $this->NOMBREPRODUCTO = $NOMBREPRODUCTO;
    }

    function setDESCRIPCION($DESCRIPCION) {
        $this->DESCRIPCION = $DESCRIPCION;
    }

    function setIVA($IVA) {
        $this->IVA = $IVA;
    }

    function setCOSTO($COSTO) {
        $this->COSTO = $COSTO;
    }

    function setPVP($PVP) {
        $this->PVP = $PVP;
    }

    function setESTADO($ESTADO) {
        $this->ESTADO = $ESTADO;
    }

    function setSTOCK($STOCK) {
        $this->STOCK = $STOCK;
    }
}
