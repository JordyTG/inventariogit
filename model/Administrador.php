<?php

class Administrador {
    private $IDADMINISTRADOR, $CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL,$EMAIL,$PASSWORD;
    function __construct($IDADMINISTRADOR, $CEDULA, $NOMBREADMINISTRADOR, $FECHANACIMIENTO, $CIUDADNACIMIENTO, $DIRECCION, $TELEFONO, $ESTADO, $ROL, $EMAIL, $PASSWORD) {
        $this->IDADMINISTRADOR = $IDADMINISTRADOR;
        $this->CEDULA = $CEDULA;
        $this->NOMBREADMINISTRADOR = $NOMBREADMINISTRADOR;
        $this->FECHANACIMIENTO = $FECHANACIMIENTO;
        $this->CIUDADNACIMIENTO = $CIUDADNACIMIENTO;
        $this->DIRECCION = $DIRECCION;
        $this->TELEFONO = $TELEFONO;
        $this->ESTADO = $ESTADO;
        $this->ROL = $ROL;
        $this->EMAIL = $EMAIL;
        $this->PASSWORD = $PASSWORD;
    }
    
    function getIDADMINISTRADOR() {
        return $this->IDADMINISTRADOR;
    }

    function getCEDULA() {
        return $this->CEDULA;
    }

    function getNOMBREADMINISTRADOR() {
        return $this->NOMBREADMINISTRADOR;
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

    function setIDADMINISTRADOR($IDADMINISTRADOR) {
        $this->IDADMINISTRADOR = $IDADMINISTRADOR;
    }

    function setCEDULA($CEDULA) {
        $this->CEDULA = $CEDULA;
    }

    function setNOMBREADMINISTRADOR($NOMBREADMINISTRADOR) {
        $this->NOMBREADMINISTRADOR = $NOMBREADMINISTRADOR;
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
