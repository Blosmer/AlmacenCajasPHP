<?php

include "../DAO/Operaciones.php";
$codigo = $_GET["codigo"];

try {
    $cajaBackup = Operaciones::buscarCajaBackup($codigo);
    $estanteriasLibres = Operaciones::listarEstanteriasLibres();
} catch (Exception $ex) {
    $errorMensaje = $conexion->error;
    header('Location: ../VISTA/paginaErrores.php?ex=' . urlencode($errorMensaje));
}
