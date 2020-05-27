<?php
use es\fdi\ucm\aw\Pedido;

require_once __DIR__.'/includes/config.php';
?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Pedidos de un usuario</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Pedidos del usuario <?php echo $_SESSION['username'];?></h1>
            <?php 
                $result = Pedido::muestraPedidos();
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