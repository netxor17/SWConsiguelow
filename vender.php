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
            <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?> 
            <div id="contenido">
                <h2>Subir un producto</h2>
            <?php 
                $form = new FormularioVender(); $form->gestiona();
            ?>
            </div>
            <?php
       require("includes/common/sidebarDer.php");
       ?>
        </div> 
        </div> 
    </body>
</html>