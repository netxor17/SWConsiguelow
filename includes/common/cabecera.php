<header>
    <nav>
    <ul class="menu">
            <li><a href="index.php?">Inicio</a></li>
            <li><a href="detalles.php">Detalles</a></li>
            <li><a href="bocetos.php">Bocetos</a></li>
            <li><a href="planificacion.php">Planificación</a></li>
            <li><a href="miembros.php">Miembros</a></li>
            <li><a href="contacto.php">Contacto</a></li> 
            <li><a href="vender.php">Vender</a></li>
            <li><a href="mostrarProducto.php">Mostrar productos</a></li>  
            <li><a href="filtrar.php">Filtrar productos</a></li>  
                <?php 
                if (isset($_SESSION['login']) && ($_SESSION["login"]===true) ) {
                    echo "Bienvenido, " . $_SESSION['username'] . ".<a href='logout.php'>(salir)</a>";
                }else {
                    echo "Usuario desconocido. <a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
                }
            ?>    
        </ul>
    </nav>
</header>