<?php

class Caja {

    private $id;
    private $codigo;
    private $color;
    private $altura;
    private $anchura;
    private $profundidad;
    private $material;
    private $contenido;
    private $fecha_alta;

    function __construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta) {
        $this->codigo = $codigo;
        $this->color = $color;
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->material = $material;
        $this->contenido = $contenido;
        $this->fecha_alta = $fecha_alta;
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

    function getColor() {
        return $this->color;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getMaterial() {
        return $this->material;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getFecha_alta() {
        return $this->fecha_alta;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

}
