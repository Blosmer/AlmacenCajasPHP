<?php

include "../DAO/Operaciones.php";
$codigo = $_GET["codigo"];


try {
    $caja = Operaciones::buscarCaja($codigo);
} catch (Exception $ex) {
    $errorMensaje = $conexion->error;
    header('Location: ../VISTA/paginaErrores.php?ex=' . urlencode($errorMensaje));
}