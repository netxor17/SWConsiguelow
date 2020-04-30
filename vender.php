<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioVender;
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Subir un producto</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Subir un producto</h1>
            <?php 
                $form = new FormularioVender(); $form->gestiona();
            ?>
            </div>
        </div>  
    </body>
</html>