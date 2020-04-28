<?php
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Mostrar tabla productos</title>
    </head>
    <body>
        <header>
        <?php
        require("includes/common/cabecera.php");
        ?>
    </header>
        <centre>
        <table>
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

         </thead>
            <tbody>
            <?php
            //session_start();
            $conexion = new mysqli("localhost", "root", "", "tiendaonline");
                $query= "SELECT * FROM productos"; //hago un query y muestro todas las filas de la tabla 'productos'
                $resultado= $conexion ->query($query);
         while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'productos' de la bd
            ?>
        <tr>
        <td><img height="50px" src="data:image/jpeg;base64,<?php echo base64_encode($fila['imagen']); ?>"/></td> <!-- muestro la imagen-->
        <td><?php echo $fila['nombre']; ?></td> <!-- recoge info de la tabla 'productos' la columna 'nombre'-->
        <td><?php echo $fila['descripcion']; ?></td>
        <td><?php echo $fila['precio']; ?></td>
        <td><?php echo $fila['unidadesDisponibles'];?></td>
        <td><?php echo $fila['talla']; ?></td>
        <td><?php echo $fila['color']; ?></td>
        <td><?php echo $fila['categoria']; ?></td>
        </tr>

        <?php
        } //fin del while
        ?>
        </tbody>
        </table>
    </centre>
    </body>
</html>

