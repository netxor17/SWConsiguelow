<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioVender;
?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vender</title>
    <link rel="stylesheet" href="styles/style.css">
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