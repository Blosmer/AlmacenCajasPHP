<?php
session_start();
?>
<nav>
    <ul>
        <li><a href="MenuInicial.php">Inicio</a></li>
        <li><a href="#">Estanterías</a>
            <div>
                <ul>
                    <li><a href="AltaEstanterias.php">Alta de Estentería</a></li>
                    <li><a href="ListadoEstanterias.php">Listado de Estanterías</a></li>
                </ul>
            </div>
        </li>

        <li><a href="#">Cajas</a>
            <div>
                <ul>
                    <li><a href="AltaCajas.php">Alta de Caja</a></li>
                    <li><a href="ListadoCajas.php">Listado de Cajas</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">Gestión Almacén</a>
            <div>
                <ul>
                    <li><a href="VistaInventario.php">Listado de Inventario</a></li>
                    <li><a href="salidaCaja.php">Salida de Cajas</a></li>
                    <li><a href="devolverCaja.php">Devolución de Cajas</a></li>
                </ul>
            </div>
        </li>
        <?php
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
            ?>
            <li><a href="login.php">Login</a></li>
            <?php
        } else {
            ?>
            <li><a href="../CONTROLADOR/controlLogOut.php">Logout</a></li>
            <?php
        }
        ?>
    </ul>
</nav>