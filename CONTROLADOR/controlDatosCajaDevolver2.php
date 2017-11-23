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
    Operaciones::devolverCaja($ObjetoCaja, $idEstanteria, $leja);
    header("Location: ../VISTA/devolverCaja.php");
} catch (Exception $ex) {
    $errorMensaje = $conexion->error;
    $conexion->rollback();
    header('Location: ../VISTA/paginaErrores.php?ex=' . urlencode($errorMensaje));
} finally {
    $conexion->autocommit(TRUE);
}
