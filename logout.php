<?php
require_once __DIR__.'/includes/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Cerrar sesion</title>
    </head>
    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Cerrar sesion</h1>
            <?php
            unset($_SESSION['username']);
            unset($_SESSION['login']);
            //unset($_SESSION['esAdmin']);
            session_destroy();
            echo 'Tu sesión ha finalizado'; 
             ?>
            </div>
        </div>
	</body>
</html>
