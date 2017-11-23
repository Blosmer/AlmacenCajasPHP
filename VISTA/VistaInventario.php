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
        ?>


        <?php
        include '../CONTROLADOR/controlInventario.php';

        if ($listaEstanterias && $listaCajas && $listaPosiciones) {
            $colorFondo = false;
            foreach ($listaEstanterias as $estanteria) {
                if ($estanteria->getNumeroLejas() != $estanteria->getLejasLibres()) {
                    ?>
                    <h2>&nbsp;</h2>
                    <table width="75%" frame="box" rules="none" border="1" align="center" bgcolor="#81BEF7" cellspacing="0" cellpadding="4">
                        <tr>
                            <td align="center">CÓDIGO</td>
                            <td align="center">MATERIAL</td>
                            <td align="center" NOWRAP>NÚMERO DE LEJAS</td>
                            <td align="center">PASILLO</td>
                            <td align="center" NOWRAP>NÚMERO PASILLO</td>
                            <td align="center" NOWRAP>LEJAS LIBRES</td>
                        </tr>
                        <tr bgcolor="#FFFFFF">
                            <td align="center" NOWRAP><?php echo ($estanteria->getCodigo()) ?></td>
                            <td align="center" NOWRAP><?php echo ($estanteria->getMaterial()) ?></td>
                            <td align="center" NOWRAP><?php echo ($estanteria->getNumeroLejas()) ?></td>
                            <td align="center" NOWRAP><?php echo ($estanteria->getPasillo()) ?></td>
                            <td align="center" NOWRAP><?php echo ($estanteria->getNumero()) ?></td>
                            <td align="center" NOWRAP><?php echo ($estanteria->getLejasLibres()) ?></td>
                        </tr>
                    </table>


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
                        if ($listaCajas and $listaPosiciones) {
                            $colorFila = false;
                            for ($i = 0; $i < sizeof($listaCajas); $i++) {
                                $caja = $listaCajas[$i];
                                $posicion = $listaPosiciones[$i];

                                if ($estanteria->getId() == $posicion->getIdEstanteria()) {
                                    $colorFila = !$colorFila;
                                    if ($colorFila) {
                                        ?>
                                        <tr bgcolor="#FFFFFF">
                                        <?php } else {
                                            ?>
                                        <tr bgcolor="#E0ECF8">
                                            <?php
                                        }
                                        ?>
                                        <td align="center" NOWRAP><?php echo ($caja->getCodigo()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getAltura()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getAnchura()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getProfundidad()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getMaterial()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getContenido()) ?></td>
                                        <td align="center" NOWRAP><?php echo ($caja->getFecha_alta()) ?></td>
                                        <td align="center" NOWRAP bgcolor="<?php echo ($caja->getColor()) ?>"><?php echo ($caja->getColor()) ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </table>


                    <?php
                }
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
    </body>
</html>
