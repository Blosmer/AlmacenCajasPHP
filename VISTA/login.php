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

        <form method="post" action="../CONTROLADOR/controlLogin.php">
            <h2>&nbsp;</h2>
            <table width="309" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h2><strong>Iniciar sesión</strong></h2></td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre de usuario:</label>
                    </td>
                    <td>
                        <input type="text" name="username" size="15" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre de usuario:</label>
                    </td>
                    <td>
                        <input type="password" name="password" size="15" required/>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td align="right">
                        <input type="submit" name="aceptar" id="aceptar" value="Aceptar" />
                    </td>
                </tr>
            </table>
        </form>

        <form action="../CONTROLADOR/controlRegistro.php" method="post">
            <h2>&nbsp;</h2>
            <table width="309" align="center" class="tablaFormulario">
                <tr>
                    <td colspan="2" align="center"><h2><strong>Registrar</strong></h2></td>
                </tr>
                <tr>
                    <td>
                        <label>Nombre de usuario:</label>
                    </td>
                    <td>
                        <input type="text" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Contraseña:</label>
                    </td>
                    <td>    
                        <input type="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <label>Repetir contraseña:</label>
                    </td>
                    <td>     
                        <input type="password" name="confirm_password" required>
                    </td>
                </tr>
                <tr>
                    <td>                       
                    </td>
                    <td align="right">     
                        <input type="submit" value="Aceptar">
                    </td>
                </tr>
            </table>
        </form>


    </body>
</html>
