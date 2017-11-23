
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

        <form id="form1" name="form1" method="post" action="../CONTROLADOR/controlAltaEstanterias.php">
            <h2>&nbsp;</h2>
            <table width="309" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h3><strong>Datos Estantería</strong></h3></td>
                </tr>
                <tr>
                    <td width="92" align="right">Código</td>
                    <td width="201"><label>
                            <input name="codigo" type="text" id="codigo" size="5" required/>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Material</td>
                    <td><label>
                            <input type="text" name="material" id="material" size="15" required/>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Número de lejas</td>
                    <td><label>
                            <input name="numeroLejas" type="number" id="numeroLejas" size="2" required/>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Pasillo</td>
                    <td><label>
                            <input name="pasillo" type="text" id="pasillo" size="1" required/>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Número pasillo</td>
                    <td><label>
                            <input name="numeroPasillo" type="number" id="numeroPasillo" size="3" required/>
                        </label></td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right"><label>
                            <input type="submit" name="Enviar" id="Enviar" value="Enviar" />
                        </label></td>
                </tr>
            </table>
        </form>
    </body>
</html>