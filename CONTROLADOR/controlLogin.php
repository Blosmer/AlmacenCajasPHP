<?php

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

include '../DAO/Operaciones.php';

try {

    $hashed_password = Operaciones::comprobarContraseña($username);

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../VISTA/MenuInicial.php');
    } else {
        echo"<script type=\"text/javascript\">alert('Usuario y/o contraseña incorrectos');"
    . " window.location='../VISTA/login.php';</script>";
    }


//    echo"<script type=\"text/javascript\">alert('Usuario registrado');"
//    . " window.location='../VISTA/login.php';</script>";
} catch (Exception $ex) {
    $errorCodigo = $conexion->errno;
    $errorMensaje = $conexion->error;
    $conexion->rollback();
    header('Location: ../VISTA/paginaErrores.php?exC=' . urlencode($errorCodigo) .
            '&&exM=' . urldecode($errorMensaje));
}
