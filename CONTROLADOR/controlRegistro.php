<?php

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$confirm_password = $_REQUEST['confirm_password'];

include '../DAO/Operaciones.php';

try {

    if ($password !== $confirm_password) {
        echo"<script type=\"text/javascript\">alert('La contraseña no coincide');"
        . " window.location='../VISTA/login.php';</script>";
    } else {
        Operaciones::crearUsuario($username, password_hash($password, PASSWORD_DEFAULT));
        echo"<script type=\"text/javascript\">alert('Usuario registrado');"
        . " window.location='../VISTA/login.php';</script>";
    }
} catch (Exception $ex) {
    $errorCodigo = $conexion->errno;
    $errorMensaje = $conexion->error;
    $conexion->rollback();
    header('Location: ../VISTA/paginaErrores.php?exC=' . urlencode($errorCodigo) .
            '&&exM=' . urldecode($errorMensaje));
}
 









