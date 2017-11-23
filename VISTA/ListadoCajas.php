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
        include '../CONTROLADOR/controlListadoCajas.php';

        if (!empty($listaCajas)) {
            ?>

            <h2>&nbsp;</h2>
            <table width="75%" frame="box" rules="none" border="1" align="center" bgcolor="#81BEF7" cellspacing="0" cellpadding="4">
                <tr>
                    <td align="center">CÓDIGO</td>
                    <td align="center" NOWRAP>ALTURA</td>
                    <td align="center">ANCHURA</td>
                    <td align="center" NOWRAP>PROFUNDIDAD</td>
                    <td align="center" NOWRAP>MATERIAL</td>
                    <td align="center" NOWRAP>CONTENIDO</td>
                    <td align="center" NOWRAP>FECHA DE ALTA</td>
                    <td align="center">COLOR</td>
                </tr>

                <?php
                $colorFondo = false;
                foreach ($listaCajas as $caja) {
                    $colorFondo = !$colorFondo;

                    if ($colorFondo) {
                        ?>
                        <tr bgcolor="#FFFFFF">
                        <?php } else {
                            ?>
                        <tr bgcolor="#E0ECF8">
                            <?php
                        }
                        ?>
                        <td align="center" NOWRAP><?php echo ($caja->getCodigo()) ?></td>
                        <td align="center" NOWRAP><?php echo ($caja->getAltura()) ?>cm</td>
                        <td align="center" NOWRAP><?php echo ($caja->getAnchura()) ?>cm</td>
                        <td align="center" NOWRAP><?php echo ($caja->getProfundidad()) ?>cm</td>
                        <td align="center" NOWRAP><?php echo ($caja->getMaterial()) ?></td>
                        <td align="center" NOWRAP><?php echo ($caja->getContenido()) ?></td>
                        <td align="center" NOWRAP><?php echo ($caja->getFecha_alta()) ?></td>
                        <td align="center" NOWRAP bgcolor="<?php echo ($caja->getColor()) ?>"><?php echo ($caja->getColor()) ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <h2>&nbsp;</h2>
                <table width="30%" frame="box" border="1" align="center" bgcolor="#FF8000" cellspacing="0" cellpadding="4">
                    <tr>
                        <td align="center" bgcolor="#F6E3CE"><h2>No hay registros</h2></td>
                    </tr>
                </table>

                <?php
            }
            ?>
            <tr>
            </tr>

        </table>



    </body>
</html>

