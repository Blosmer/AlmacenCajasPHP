/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function muestraLejas(str) {
    var xmlhttp;
    if (str == "") {
        document.getElementById("Lista_Lejas").
                innerHTML = "";
        return;
    }
    /*Asumiendo que el select de la estación destino se llama Lista_Destino, si la cadena de 
     Lista_Origen es vacía, también lo será Lista_Destino
     */
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        /* Creamos el objeto request para conexiones http,
         compatible con los navegadores descritos*/
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        /*Como el explorer
         va por su cuenta, el objeto es un ActiveX */
    }

    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("Lista_Lejas").innerHTML = xmlhttp.responseText;
            /*Seleccionamos el elemento que recibirá el flujo de 
             datos*/
        }
    }
    xmlhttp.open("GET", "AjaxLejasLibres.php?Lista_Estanterias=" + str, true);
    /*Mandamos al PHP encargado de traer los datos, el valor de referencia */
    xmlhttp.send();
}


