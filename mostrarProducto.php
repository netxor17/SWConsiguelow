<?php
use es\fdi\ucm\aw\Producto;

require_once __DIR__.'/includes/config.php';
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mostrar producto</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Mostrando productos</h1>
            <?php 
                $producto = '';
                $producto = Producto::muestraProductos();
            ?>
            </div>
        </div>  
    </body>
</html>

