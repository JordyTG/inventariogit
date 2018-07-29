<?php

class AjusteProducto {
    private $IDAJUSTE, $IDPRODUCTO, $NUMEROAJUSTE, $CABECERA, $FECHAAJUSTE, $DETALLE, $CANTIDAD;
    
    function __construct($IDAJUSTE, $IDPRODUCTO, $NUMEROAJUSTE, $CABECERA, $FECHAAJUSTE, $DETALLE, $CANTIDAD) {
        $this->IDAJUSTE = $IDAJUSTE;
        $this->IDPRODUCTO = $IDPRODUCTO;
        $this->NUMEROAJUSTE = $NUMEROAJUSTE;
        $this->CABECERA = $CABECERA;
        $this->FECHAAJUSTE = $FECHAAJUSTE;
        $this->DETALLE = $DETALLE;
        $this->CANTIDAD = $CANTIDAD;
    }
    
    function getIDAJUSTE() {
        return $this->IDAJUSTE;
    }

    function getIDPRODUCTO() {
        return $this->IDPRODUCTO;
    }

    function getNUMEROAJUSTE() {
        return $this->NUMEROAJUSTE;
    }

    function getCABECERA() {
        return $this->CABECERA;
    }

    function getFECHAAJUSTE() {
        return $this->FECHAAJUSTE;
    }

    function getDETALLE() {
        return $this->DETALLE;
    }

    function getCANTIDAD() {
        return $this->CANTIDAD;
    }

    function setIDAJUSTE($IDAJUSTE) {
        $this->IDAJUSTE = $IDAJUSTE;
    }

    function setIDPRODUCTO($IDPRODUCTO) {
        $this->IDPRODUCTO = $IDPRODUCTO;
    }

    function setNUMEROAJUSTE($NUMEROAJUSTE) {
        $this->NUMEROAJUSTE = $NUMEROAJUSTE;
    }

    function setCABECERA($CABECERA) {
        $this->CABECERA = $CABECERA;
    }

    function setFECHAAJUSTE($FECHAAJUSTE) {
        $this->FECHAAJUSTE = $FECHAAJUSTE;
    }

    function setDETALLE($DETALLE) {
        $this->DETALLE = $DETALLE;
    }

    function setCANTIDAD($CANTIDAD) {
        $this->CANTIDAD = $CANTIDAD;
    }
}
