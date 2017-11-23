<?php

$codigo = $_REQUEST['codigo'];

include '../DAO/Operaciones.php';

try {
    Operaciones::sacarCaja($codigo);
    header("Location: ../VISTA/salidaCaja.php");
} catch (Exception $ex) {
    $errorMensaje = $conexion->error;
    $conexion->rollback();
    header('Location: ../VISTA/paginaErrores.php?ex=' . urlencode($errorMensaje));
}
