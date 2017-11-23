
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Documento sin título</title>
        <LINK REL=StyleSheet HREF="./estiloMenu.css" TYPE="text/css" MEDIA=screen>
    </head>

    <body>
        <?php
        include "barraNavegacion.php";
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            header("Location: Login.php");
            exit;
        }
        ?>

        <form id="form1" name="form1" method="post" action="../CONTROLADOR/controlDevolverCaja2.php">
            <h2>&nbsp;</h2>
            <table width="340" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h3><strong>Buscar Caja</strong></h3></td>
                </tr>
                <tr>
                    <td align="right">Código</td>
                    <td width="200"><label>
                            <input name="codigo" type="text" id="codigo" size="5" list="codigos_cajas" autocomplete="off" required/>
                        </label></td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right"><label>
                            <input type="submit" id="enviar" value="Enviar" />
                        </label></td>
                </tr>
            </table>
            <p>&nbsp;</p>
        </form>

        <datalist id="codigos_cajas">
            <?php
            include '../CONTROLADOR/controlDevolverCaja1.php';

            if ($cajasBackup) {

                foreach ($cajasBackup as $caja) {
                    ?>                   
                    <option value="<?php echo($caja->getCodigo()) ?>">
                        <?php
                    }
                }
                ?>
        </datalist>

    </body>
</html>
