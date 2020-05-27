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
                <h1>Mostrando busqueda</h1>
            <?php 
            
            /*$result =false;
            $argumento = $_GET[''];
            if($argumento == $algo){
                $result = Producto::muestraProductosPorCat();            
            } else {
                $result = Producto::muestraProductosPorNombre();
            }*/
                //$result = Producto::muestraProductosPorCat(); 
                
                $result = Producto::muestraProductosPorNombre();
                $array = $result;
                foreach($array as $key => $fila){
                ?>
                <li>IdProd: <?php echo $fila['id'];?></br>
                Nombre Producto: <?php echo $fila['nombre'];?></br>
                Descripcion: <?php echo $fila['descripcion'];?></br>
                Precio: <?php echo $fila['precio'];?></br>
                Categoria: <?php echo $fila['categoria'];?></br>
                </br>
                <?php  
                }
            ?>
            </div>
        </div>  
    </body>
</html>

