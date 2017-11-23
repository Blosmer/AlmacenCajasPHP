<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        $exC = $_GET["exC"];
        $exM = $_GET["exM"];
        //echo $ex;
        ?>

        <h2>&nbsp;</h2>
        <table width="30%" frame="box" border="1" align="center" bgcolor="#FF8000" cellspacing="0" cellpadding="4">
            <tr>
                <td align="center">CÓDIGO ERROR</td>
                <td align="center" bgcolor="#F6E3CE"><?php echo $exC?></td>
            </tr>
            <tr>
                <td align="center">MENSAJE</td>
                <td align="center" bgcolor="#F6E3CE"><?php echo $exM?></td>
            </tr>

        </table>


    </body>
</html>
