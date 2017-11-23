<!DOCTYPE html>
<?php
include "../DAO/ConectarBDPHP.php";
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        global $conexion;

        $idEstanteria = $_REQUEST['Lista_Estanterias'];

        $instruccion = "SELECT leja_ocupada FROM OCUPACION WHERE id_estanteria='$idEstanteria'";
        $consulta = mysqli_query($conexion, $instruccion) or die("Instrucción errónea")or die("Fallo en la consulta");

        $nfilas = mysqli_num_rows($consulta);

        $lejasOcupadas = Array();
        while ($fila = mysqli_fetch_row($consulta)) {
            $lejasOcupadas[] = $fila[0];
        }

        $instruccion2 = "SELECT numero_lejas FROM ESTANTERIAS WHERE id='$idEstanteria'";
        $consulta2 = mysqli_query($conexion, $instruccion2) or die("Instrucción errónea")or die("Fallo en la consulta");

        $fila2 = mysqli_fetch_row($consulta2);

        $lejasLibres = Array();
        $contador = 1;
        for ($i = 0; $i < $fila2[0]; $i++) {
            $lejasLibres[] = $contador;
            $contador++;
        }

        $lejasLibres = array_diff($lejasLibres, $lejasOcupadas);
        
        ?>
    <option>--Select--</option>
    <?php
    foreach ($lejasLibres as $leja) {
        ?>
        <option value="<?php echo $leja ?>"><?php echo $leja ?> </option>   
        <?php
    }
    ?>
</body>
</html>