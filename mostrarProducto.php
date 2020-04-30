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
        <header>
        <?php
        require("includes/common/cabecera.php");
        ?>
    </header>
     <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
       
        <table class="tabla-productos">
         <thead>
            <tr>
                 <th>Imagen</th>
                 <th>Nombre</th>
                 <th>Descripcion</th>
                 <th>Precio</th>
                 <th>Unidades</th>
                 <th>Talla</th>
                 <th>Color</th>
                 <th>Categoria</th>
            </tr>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Mostrando productos</h1>
            <?php 
                $producto = Producto::muestraProductos();
            ?>
            </div>
        </div>  
    </body>
</html>

