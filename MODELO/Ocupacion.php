<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ocupacion
 *
 * @author Mac
 */
class Ocupacion {
    private $id;
    private $idCaja;
    private $idEstanteria;
    private $lejaOcupada;
    
    function __construct($idCaja, $idEstanteria, $lejaOcupada) {
        $this->idCaja=$idCaja;
        $this->idEstanteria=$idEstanteria;
        $this->lejaOcupada=$lejaOcupada;
    }
    function getId() {
        return $this->id;
    }

    function getIdCaja() {
        return $this->idCaja;
    }

    function getIdEstanteria() {
        return $this->idEstanteria;
    }

    function getLejaOcupada() {
        return $this->lejaOcupada;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdCaja($idCaja) {
        $this->idCaja = $idCaja;
    }

    function setIdEstanteria($idEstanteria) {
        $this->idEstanteria = $idEstanteria;
    }

    function setLejaOcupada($lejaOcupada) {
        $this->lejaOcupada = $lejaOcupada;
    }

}
