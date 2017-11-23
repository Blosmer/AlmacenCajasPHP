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

        include "../CONTROLADOR/controlListadoEstanterias.php";

        if (!empty($listaEstanterias)) {
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


                <?php
                $colorFondo = false;
                foreach ($listaEstanterias as $estanteria) {
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
                        <td align="center" NOWRAP><?php echo ($estanteria->getCodigo()) ?></td>
                        <td align="center" NOWRAP><?php echo ($estanteria->getMaterial()) ?></td>
                        <td align="center" NOWRAP><?php echo ($estanteria->getNumeroLejas()) ?></td>
                        <td align="center" NOWRAP><?php echo ($estanteria->getPasillo()) ?></td>
                        <td align="center" NOWRAP><?php echo ($estanteria->getNumero()) ?></td>
                        <td align="center" NOWRAP><?php echo ($estanteria->getLejasLibres()) ?></td>
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
