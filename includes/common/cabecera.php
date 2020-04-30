<div id="cabecera">
    <div id="titulo">
    <h1>CONSIGUELOW</h1>
    </div>
    <nav>
        <ul class="menu">
            <li><a href="index.php?">Inicio</a></li><li><a href="detalles.php">Detalles</a></li><li><a href="bocetos.php">Bocetos</a></li><li><a href="planificacion.php">Planificación</a></li><li><a href="miembros.php">Miembros</a></li><li><a href="contacto.php">Contacto</a></li><li><a href="vender.php">Vender</a></li><li><a href="mostrarProducto.php">Mostrar productos</a></li>

        </ul>
        <ul class="profile">
            <?php
            if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
                ?>
                <li>Bienvenido, <?php echo $_SESSION['username']; ?></li><li><a href="logout.php">(salir)</a></li>

            <?php
            } else {
            ?>
                <li>Usuario desconocido.</li><li><a href="login.php">Login</a></li><li><a href="registro.php">Registro</a></li>
            <?php
            }
            ?>
    </ul>
    </nav>
</div>