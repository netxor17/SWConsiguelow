
<?php 
require_once __DIR__.'/includes/config.php';
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mostrar carrito</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Mostrando carrito</h1>
                <table>
                <thead>
                <tr>
                     <th>Nombre</th>
                     <th>Precio</th>
                     <th>Talla</th>
                     <th>Color</th>
                     <th>Unidades</th>
                </tr>
                </thead>
                <tbody>
                <?php
             if(isset($_SESSION['carrito'])){
                $array=$_SESSION['carrito'];
                foreach($array as $key => $fila){
                ?>
                <tr>
                <td><?php echo $fila['nombreProd'];?></td>
                <td><?php echo $fila['precio'];?></td>
                <td><?php echo $fila['talla'];?></td>
                <td><?php echo $fila['color'];?></td>
                <td><?php echo $fila['unidades']; ?></td>
                </tr>
                <?php
                }
            }
                ?>
                </tbody>
                </table>

            </div>
        </div>
    </body>
    
</html>