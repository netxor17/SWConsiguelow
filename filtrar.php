
<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioFiltrar;
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Filtrar producto</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Filtrar  productos</h1>
             <h2>Filtrar por...</h2></br>
             <?php 
                $form = new FormularioFiltrar(); 
                $form->gestiona();
            ?>
             
            </div>
        </div>  
    </body>
</html>