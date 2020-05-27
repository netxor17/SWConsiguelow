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
                <h1>Mostrando todos los productos</h1>
            <?php 
                $result = Producto::muestraProds();
                $array = $result;
                foreach($array as $key => $fila){
                ?>
                <li>IdProd: <?php echo $fila['id'];?></br>
                Nombre Producto: <?php echo $fila['nombre'];?></br>
                Descripcion: <?php echo $fila['descripcion'];?></br>
                Precio: <?php echo $fila['precio'];?></br>
                Categoria: <?php echo $fila['categoria'];?></br>
                <a href="./FormularioCarrito.php">Añadir al carrito</a>
                </br>
                <?php  
                }
            ?>
            </div>
        </div>  
    </body>
</html>

