<?php

class Estanteria {
    private $id;
    private $codigo;
    private $material;
    private $numeroLejas;
    private $numero;
    private $pasillo;
    private $lejasLibres;
    
    function __construct($codigo, $material, $numeroLejas, $numero, $pasillo) {
        $this->codigo = $codigo;
        $this->material = $material;
        $this->numeroLejas = $numeroLejas;
        $this->numero = $numero;
        $this->pasillo = $pasillo;
        $this->lejasLibres = $numeroLejas;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        
    function getCodigo() {
        return $this->codigo;
    }

    function getMaterial() {
        return $this->material;
    }

    function getNumeroLejas() {
        return $this->numeroLejas;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPasillo() {
        return $this->pasillo;
    }

    function getLejasLibres() {
        return $this->lejasLibres;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setNumeroLejas($numeroLejas) {
        $this->numeroLejas = $numeroLejas;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    function setLejasLibres($lejasLibres) {
        $this->lejasLibres = $lejasLibres;
    }

    public function __toString() {
        return "Codigo :".$this->codigo."   Material: ".$this->material."<br>";  
    }

}
