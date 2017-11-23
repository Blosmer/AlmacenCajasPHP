<?php

$codigo = $_REQUEST['codigo'];
$color = $_REQUEST['color'];
$altura = $_REQUEST['altura'];
$anchura = $_REQUEST['anchura'];
$profundidad = $_REQUEST['profundidad'];
$material = $_REQUEST['material'];
$contenido = $_REQUEST['contenido'];
$fecha_alta = $_REQUEST['fechaAlta'];
$idEstanteria = $_REQUEST['Lista_Estanterias'];
$leja = $_REQUEST['Lista_Lejas'];

include '../DAO/Operaciones.php';
include_once '../MODELO/Caja.php';

$ObjetoCaja = new Caja($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta);

try {
    Operaciones::insertarCaja($ObjetoCaja, $idEstanteria, $leja);

    echo"<script type=\"text/javascript\">alert('Caja registrada');"
    . " window.location='../VISTA/AltaCajas.php';</script>";
} catch (Exception $ex) {
    $errorCodigo = $conexion->errno;
    $errorMensaje = $conexion->error;
    $conexion->rollback();
    header('Location: ../VISTA/paginaErrores.php?exC=' . urlencode($errorCodigo).
            '&&exM='. urldecode($errorMensaje));
}