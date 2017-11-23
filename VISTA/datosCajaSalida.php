
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <LINK REL=StyleSheet HREF="./estiloMenu.css" TYPE="text/css" MEDIA=screen>
    </head>
    <body>
        <?php
        include "barraNavegacion.php";
        include '../CONTROLADOR/controlDatosCajaSalida1.php';
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header("Location: Login.php");
            exit;
        }
        ?>

        <form id="form1" name="form1" method="post" action="../CONTROLADOR/controlDatosCajaSalida2.php">
            <h2>&nbsp;</h2>
            <input type="hidden" name="codigo" value="<?php echo ($caja->getCodigo()) ?>">
            <table width="300" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h3><strong>Datos Caja</strong></h3></td>
                </tr>
                <tr>
                    <td align="right">Código</td>
                    <td width="200"><label>
                            <?php echo ($caja->getCodigo()) ?>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Color</td>
                    <td ><label style="background-color: <?php echo ($caja->getColor()); ?>">
                            <?php echo ($caja->getColor()); ?>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Dimensiones</td>
                    <td><label>
                            H: <?php echo ($caja->getAltura()) ?><label>cm</label><br/>
                            W: <?php echo ($caja->getAnchura()) ?><label>cm</label><br/>
                            D: <?php echo ($caja->getProfundidad()) ?><label>cm</label><br/>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Material</td>
                    <td><label>
                            <?php echo ($caja->getMaterial()) ?>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Contenido</td>
                    <td><label>
                            <?php echo ($caja->getContenido()) ?>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Fecha de alta</td>
                    <td><label>
                            <?php echo ($caja->getFecha_alta()) ?>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Estanteria</td>
                    <td>
                        <label>
                            <?php echo ($caja->getCodigoEstanteria()) ?>
                        </label></td>
                </tr>
                <tr>

                    <td align="right">Leja</td>
                    <td>
                        <label>
                            <?php echo ($caja->getLeja()) ?>
                        </label></td>
                </tr>

                <tr>
                    <td>
                        <input type="button" id="volver" value="Volver" 
                               onclick="location.href = 'salidaCaja.php'"/></td>
                    <td align="right"><label>
                            <input type="submit" name="aceptar" id="aceptar" value="Aceptar" />
                        </label></td>
                </tr>
            </table>
            <p>&nbsp;</p>
        </form>

    </body>
</html>