<?php

include "../MODELO/Estanteria.php";
include "../MODELO/Caja.php";
include "../MODELO/cajaBackup.php";
include "../MODELO/Ocupacion.php";
include "../MODELO/insertException.php";
include "ConectarBDPHP.php";

class Operaciones {

    static function insertarEstanteria(Estanteria $ObjetoEstanteria) {
        $codigo = $ObjetoEstanteria->getCodigo();
        $material = $ObjetoEstanteria->getMaterial();
        $numeroLejas = $ObjetoEstanteria->getNumeroLejas();
        $numero = $ObjetoEstanteria->getNumero();
        $pasillo = $ObjetoEstanteria->getPasillo();
        $lejasLibres = $ObjetoEstanteria->getLejasLibres();

        global $conexion;

        $sentencia = $conexion->prepare("INSERT INTO ESTANTERIAS VALUES (null, ?, ?, ?, ?, ?, ?)");
        $sentencia->bind_param("ssiisi", $codigo, $material, $numeroLejas, $numero, $pasillo, $lejasLibres);
        //$sentencia->execute();

        if (!$sentencia->execute()) {
            throw new Exception($conexion->error, $conexion->errno);
        }
    }

    static function listarEstanterias() {
        global $conexion;
        $ordenSQL = "SELECT * FROM ESTANTERIAS";
        $result = $conexion->query($ordenSQL);

        if (!$result) {
            throw new Exception($conexion->error, $conexion->errno);
        } else {
            $listaEstanterias = Array();

            while ($fila = mysqli_fetch_row($result)) {
                $estanteria = new Estanteria($fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
                $estanteria->setLejasLibres($fila[6]);
                $estanteria->setId($fila[0]);

                $listaEstanterias[] = $estanteria;
            }
            return $listaEstanterias;
        }
    }

    static function listarEstanteriasLibres() {
        global $conexion;
        $ordenSQL = "SELECT * FROM ESTANTERIAS WHERE lejas_libres>0";
        $result = $conexion->query($ordenSQL);

        if (!$result) {
            throw new Exception($conexion->error, $conexion->errno);
        } else {
            $listaEstanterias = Array();

            while ($fila = mysqli_fetch_row($result)) {
                $estanteria = new Estanteria($fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);
                $estanteria->setLejasLibres($fila[6]);
                $estanteria->setId($fila[0]);

                $listaEstanterias[] = $estanteria;
            }
            return $listaEstanterias;
        }
    }

    static function insertarCaja(Caja $ObjetoCaja, $idEstanteria, $leja) {
        global $conexion;

        $codigo = $ObjetoCaja->getCodigo();
        $color = $ObjetoCaja->getColor();
        $altura = $ObjetoCaja->getAltura();
        $anchura = $ObjetoCaja->getAnchura();
        $profundidad = $ObjetoCaja->getProfundidad();
        $material = $ObjetoCaja->getMaterial();
        $contenido = $ObjetoCaja->getContenido();
        $fecha_alta = $ObjetoCaja->getFecha_alta();

        $conexion->autocommit(FALSE);

        $result0 = mysqli_query($conexion, "SELECT * FROM CAJAS_BACKUP WHERE codigo='$codigo'");
        if (mysqli_num_rows($result0) != 0) {
            throw new Exception($conexion->error, $conexion->errno);
        }

        $result1 = $conexion->query("INSERT INTO CAJAS VALUES(null, '$codigo','$color','$altura'," .
                "'$anchura','$profundidad','$material','$contenido','$fecha_alta')");
        if (!$result1) {
            throw new Exception($conexion->error, $conexion->errno);
        }

        $idCaja = mysqli_insert_id($conexion);
        $result2 = $conexion->query("INSERT INTO OCUPACION VALUES (null, '$idCaja', '$idEstanteria', '$leja')");
        if (!$result2) {
            throw new Exception($conexion->error, $conexion->errno);
        }

        $result3 = $conexion->query("UPDATE ESTANTERIAS SET lejas_libres = (lejas_libres - 1) WHERE id = '$idEstanteria'");
        if (!$result3) {
            throw new Exception($conexion->error, $conexion->errno);
        }
        $conexion->commit();
    }

    static function listarCajas() {
        global $conexion;
        $ordenSQL = "SELECT * FROM CAJAS";
        $result = $conexion->query($ordenSQL);

        if (!$result) {
            throw new Exception($conexion->error, $conexion->errno);
        } else {
            $listaCajas = Array();

            while ($fila = mysqli_fetch_row($result)) {
                $caja = new Caja($fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]);
                $caja->setId($fila[0]);
                $listaCajas[] = $caja;
            }
            return $listaCajas;
        }
    }

    static function listarCajasBackup() {
        global $conexion;
        $ordenSQL = "SELECT * FROM CAJAS_BACKUP";
        $result = $conexion->query($ordenSQL);

        if (!$result) {
            throw new Exception($conexion->error, $conexion->errno);
        } else {
            $listaCajasBackup = Array();

            while ($fila = mysqli_fetch_row($result)) {
                $cajaBackup = new cajaBackup($fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]
                        , $fila[9], $fila[10]);
                $cajaBackup->setId($fila[0]);
                $listaCajasBackup[] = $cajaBackup;
            }
            return $listaCajasBackup;
        }
    }

    static function listarInventario() {
        global $conexion;

        $ordenSQL1 = "SELECT C.*, O.* FROM CAJAS C, OCUPACION O WHERE C.id = O.id_caja GROUP BY O.id_caja";
        $result1 = $conexion->query($ordenSQL1);

        if (!$result1) {
            throw new Exception($conexion->error, $conexion->errno);
        } else {
            $listaCajas = Array();
            $listaOcupacion = Array();

            while ($fila = mysqli_fetch_row($result1)) {
                $caja = new Caja($fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]);
                $caja->setId($fila[0]);
                $listaCajas[] = $caja;

                $ocupacion = new Ocupacion($fila[10], $fila[11], $fila[12]);
                $listaOcupacion[] = $ocupacion;
            }

            return [$listaCajas, $listaOcupacion];
        }
    }

    static function buscarCaja($codigo) {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT C.id, C.codigo, C.color, C.altura, C.anchura, C.profundidad, C.material,
                C.contenido, C.fecha_alta, E.codigo as codigo_estanteria, O.leja_ocupada FROM CAJAS C, ESTANTERIAS E,
                OCUPACION O WHERE C.id = O.id_caja AND O.id_estanteria=E.id AND C.codigo=?");
        $sentencia->bind_param("s", $codigo);
        $sentencia->execute();

        $sentencia->bind_result($id, $codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fechaAlta, $codigoEstanteria, $lejaOcupada);
        $sentencia->fetch();

        $caja = new cajaBackup($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fechaAlta, $codigoEstanteria, $lejaOcupada);

        if (!$sentencia) {
            throw new Exception($conexion->error, $conexion->errno);
        }
        return $caja;
    }

    static function buscarCajaBackup($codigo) {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT id, codigo, color, altura, anchura, profundidad, material,
                contenido, fecha_alta, codigo_estanteria, leja FROM CAJAS_BACKUP WHERE codigo=?");
        $sentencia->bind_param("s", $codigo);
        $sentencia->execute();

        $sentencia->bind_result($id, $codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fechaAlta, $codigoEstanteria, $lejaOcupada);
        $sentencia->fetch();

        $cajaBackup = new cajaBackup($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fechaAlta, $codigoEstanteria, $lejaOcupada);

        if (!$sentencia) {
            throw new Exception($conexion->error, $conexion->errno);
        }
        return $cajaBackup;
    }

    static function sacarCaja($codigo) {
        global $conexion;

        $sentencia = $conexion->prepare("DELETE FROM CAJAS WHERE codigo=?");
        $sentencia->bind_param("s", $codigo);
        $sentencia->execute();

        if (!$sentencia) {
            throw new Exception($conexion->error, $conexion->errno);
        }
    }

    static function devolverCaja(Caja $ObjetoCaja, $idEstanteria, $leja) {
        $codigo = $ObjetoCaja->getCodigo();
        $color = $ObjetoCaja->getColor();
        $altura = $ObjetoCaja->getAltura();
        $anchura = $ObjetoCaja->getAnchura();
        $profundidad = $ObjetoCaja->getProfundidad();
        $material = $ObjetoCaja->getMaterial();
        $contenido = $ObjetoCaja->getContenido();
        $fecha_alta = $ObjetoCaja->getFecha_alta();

        global $conexion;
        $conexion->autocommit(FALSE);
        $result0 = $conexion->query("DELETE FROM CAJAS_BACKUP WHERE codigo='$codigo'");

        $result1 = $conexion->query("INSERT INTO CAJAS VALUES(null, '$codigo','$color','$altura'," .
                "'$anchura','$profundidad','$material','$contenido','$fecha_alta')");

        $idCaja = mysqli_insert_id($conexion);

        $result2 = $conexion->query("INSERT INTO OCUPACION VALUES (null, '$idCaja', '$idEstanteria', '$leja')");

        $result3 = $conexion->query("UPDATE ESTANTERIAS SET lejas_libres = (lejas_libres - 1) WHERE id = '$idEstanteria'");

        if (!$result0 || !$result1 || !$result2 || !$result3) {
            $conexion->rollback();
        } else {
            $conexion->commit();
            $conexion->autocommit(TRUE);
        }
    }

    static function crearUsuario($username, $password) {
        global $conexion;

        $sentencia = $conexion->prepare("INSERT INTO usuarios VALUES (null, ?, ?, curdate())");
        $sentencia->bind_param("ss", $username, $password);

        if (!$sentencia->execute()) {
            throw new Exception($conexion->error, $conexion->errno);
        }
    }

    static function comprobarContraseña($username) {
        global $conexion;

        $sentencia = $conexion->prepare("SELECT password FROM usuarios WHERE username=?");
        $sentencia->bind_param("s", $username);
        $sentencia->execute();

        $sentencia->bind_result($password);
        $sentencia->fetch();

        return $password;
    }

}
