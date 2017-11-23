<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bd_almacen_pmc');

# Establecer la conexión con el servidor
@$conexion = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// La @ delante de la instrucción impide que se genere un error de PHP y solo salga nuestro mensaje
/*
  $conexion->connect_errno;
  $conexion:
  Es 0 cuando no hay error.
  1045 cuando el usuario o clave no es correcto.
  2002 cuando el server no es correcto
 */
$conexion->set_charset("utf8");
// para evitar que se interpreten mal las tildes y ñ.
if (!$conexion->connect_errno) {
//            echo "<h2> Conexión establecida con el servidor</h2><br>"; 
    # Seleccionar la base de datos
    $conexion->select_db("bd_almacen_pmc") or die("Base de Datos no encontrada");
//                echo "<h2> Conexión establecida con la base de datos bd_empleados</h2><br>";             
} else {
    echo "<h2> No ha sido posible crear la conexión con el servidor</h2><br>";
} 


