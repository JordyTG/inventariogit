<?php
class Bodeguero {
    private $IDBODEGUERO, $CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD;
    
    function __construct($IDBODEGUERO, $CEDULA, $NOMBREBODEGUERO, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $this->IDBODEGUERO = $IDBODEGUERO;
        $this->CEDULA = $CEDULA;
        $this->NOMBREBODEGUERO = $NOMBREBODEGUERO;
        $this->FECHANACIMIENTO = $FECHANACIMIENTO;
        $this->CIUDADNACIMIENTO = $CIUDADNACIMIENTO;
        $this->DIRECCION = $DIRECCION;
        $this->TELEFONO = $TELEFONO;
        $this->ESTADO = $ESTADO;
        $this->ROL = $ROL;
        $this->EMAIL = $EMAIL;
        $this->PASSWORD = $PASSWORD;
    }
    
    function getIDBODEGUERO() {
        return $this->IDBODEGUERO;
    }

    function getCEDULA() {
        return $this->CEDULA;
    }

    function getNOMBREBODEGUERO() {
        return $this->NOMBREBODEGUERO;
    }

    function getFECHANACIMIENTO() {
        return $this->FECHANACIMIENTO;
    }

    function getCIUDADNACIMIENTO() {
        return $this->CIUDADNACIMIENTO;
    }

    function getDIRECCION() {
        return $this->DIRECCION;
    }

    function getTELEFONO() {
        return $this->TELEFONO;
    }

    function getESTADO() {
        return $this->ESTADO;
    }

    function getROL() {
        return $this->ROL;
    }

    function getEMAIL() {
        return $this->EMAIL;
    }

    function getPASSWORD() {
        return $this->PASSWORD;
    }

    function setIDBODEGUERO($IDBODEGUERO) {
        $this->IDBODEGUERO = $IDBODEGUERO;
    }

    function setCEDULA($CEDULA) {
        $this->CEDULA = $CEDULA;
    }

    function setNOMBREBODEGUERO($NOMBREBODEGUERO) {
        $this->NOMBREBODEGUERO = $NOMBREBODEGUERO;
    }

    function setFECHANACIMIENTO($FECHANACIMIENTO) {
        $this->FECHANACIMIENTO = $FECHANACIMIENTO;
    }

    function setCIUDADNACIMIENTO($CIUDADNACIMIENTO) {
        $this->CIUDADNACIMIENTO = $CIUDADNACIMIENTO;
    }

    function setDIRECCION($DIRECCION) {
        $this->DIRECCION = $DIRECCION;
    }

    function setTELEFONO($TELEFONO) {
        $this->TELEFONO = $TELEFONO;
    }

    function setESTADO($ESTADO) {
        $this->ESTADO = $ESTADO;
    }

    function setROL($ROL) {
        $this->ROL = $ROL;
    }

    function setEMAIL($EMAIL) {
        $this->EMAIL = $EMAIL;
    }

    function setPASSWORD($PASSWORD) {
        $this->PASSWORD = $PASSWORD;
    }
}
