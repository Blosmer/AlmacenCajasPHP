<?php

include '../DAO/Operaciones.php';

$listaEstanterias = Operaciones::listarEstanterias();
$listaInventario = Operaciones::listarInventario();

list($listaCajas, $listaPosiciones) = $listaInventario;
