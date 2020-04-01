

<!DOCTYPE html>
<html>
    <head>
        <title>Mostrar tabla productos</title>
    </head>
    <body>
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
            $conexion = new mysqli("localhost", "root", "", "tiendaonline");
                $query= "SELECT * FROM productos"; //hago un query y muestro todas las filas de la tabla 'productos'
                $resultado= $conexion ->query($query);
         while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'productos' de la bd
            ?>
        <tr>
        <td><img height="50px" src="data:image/jpeg;base64,<?php echo base64_encode($fila['imagen']); ?>"/></td> <!-- muestro la imagen-->
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['descripcion']; ?></td>
        <td><?php echo $fila['precio']; ?></td>
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

