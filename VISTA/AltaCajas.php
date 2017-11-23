
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

        <form id="form1" name="form1" method="post" action="../CONTROLADOR/controlAltaCajas.php">
            <h2>&nbsp;</h2>
            <table width="340" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h3><strong>Datos Caja</strong></h3></td>
                </tr>
                <tr>
                    <td align="right">Código</td>
                    <td width="201"><label>
                            <input name="codigo" type="text" id="codigo" size="5" required/>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Color</td>
                    <td><label>
                            <input type="color" name="color" id="color" size="5" required/>
                        </label></td>
                </tr>
                <tr>
                    <td align="right">Dimensiones</td>
                    <td><label>
                            <input name="altura" type="number" id="altura" size="5" placeholder="Altura" required/><label>cm</label>
                            <input name="anchura" type="number" id="anchura" size="5" placeholder="Anchura" required/><label>cm</label>
                            <input name="profundidad" type="number" id="profundidad" size="5" placeholder="Profundidad" required/><label>cm</label>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Material</td>
                    <td><label>
                            <input name="material" type="text" id="material" size="20" required/>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Contenido</td>
                    <td><label>
                            <input name="contenido" type="text" id="contenido" size="20" required/>
                        </label></td>
                </tr>

                <tr>
                    <td align="right">Fecha de alta</td>
                    <td><label>
                            <input name="fechaAlta" type="date" id="fechaAlta" size="20" required/>
                        </label></td>
                </tr>

                <tr>

                <script src="../JAVASCRIPT/gestionLejas.js"></script>
                <td align="right">Estanteria</td>
                <td>

                    <select name="Lista_Estanterias" type="text" id="Lista_Estanterias" onchange="muestraLejas(this.value)">
                        <option>--Select--</option>
                        <?php
                        include '../DAO/Operaciones.php';
                        $estanteriasLibres = Operaciones::listarEstanteriasLibres();

                        if ($estanteriasLibres) {

                            foreach ($estanteriasLibres as $estanteria) {
                                ?>                   
                                <option value="<?php echo($estanteria->getId()) ?>">
                                    <?php
                                    echo($estanteria->getCodigo() . " Pasillo:" . $estanteria->getPasillo() .
                                    " Número:" . $estanteria->getNumero())
                                    ?>
                                </option>          
                                <?php
                            }
                        }
                        ?>
                    </select>

                    <label>Leja
                        <select name="Lista_Lejas" type="text" id="Lista_Lejas"/>
                    </label></td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right"><label>
                            <input type="submit" name="Enviar" id="Enviar" value="Enviar" />
                        </label></td>
                </tr>
            </table>
            <p>&nbsp;</p>
        </form>
    </body>
</html>

