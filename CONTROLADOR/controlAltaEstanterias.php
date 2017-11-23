<?php

$codigo = $_REQUEST['codigo'];
$material = $_REQUEST['material'];
$numeroLejas = $_REQUEST['numeroLejas'];
$pasillo = $_REQUEST['pasillo'];
$numero = $_REQUEST['numeroPasillo'];

include '../DAO/Operaciones.php';
include_once'../MODELO/Estanteria.php';

$ObjetoEstanteria = new Estanteria($codigo, $material, $numeroLejas, $numero, $pasillo);

try {
    Operaciones::insertarEstanteria($ObjetoEstanteria);
    
    echo"<script type=\"text/javascript\">alert('Estanteria registrada');"
    . " window.location='../VISTA/AltaEstanterias.php';</script>";
} catch (Exception $ex) {
    $errorMensaje = $conexion->error;
    header('Location: ../VISTA/paginaErrores.php?ex=' . urlencode($errorMensaje));
}