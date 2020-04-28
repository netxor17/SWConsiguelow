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
    <body>
        <centre>
            <form action="anadir.php" method="POST" enctype="multipart/form-data">   <!-- formulario para rellenar los campos -->
            <input type="text" REQUIRED name="nombreProducto" placeholder="Nombre del producto.." value="" /></br></br>  <!-- REQUIRED significa campo obligatorio -->
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="text" REQUIRED name="precio" placeholder="Precio producto.." value="" /></br></br>
            <input type="text" REQUIRED name="unidades" placeholder="Unidades.." value="" /></br></br>
            <input type="text" REQUIRED name="talla" placeholder="Talla.." value="" /></br></br>
            <input type="text" REQUIRED name="color" placeholder="Color..." value="" /></br></br>
            <input type="text" REQUIRED name="categoria" placeholder="Categoria.." value="" /></br></br>
            <input type="file" name="imagen" /></br></br>
            <input type="submit" name="enviar" value="Enviar" /></br></br>
            <input type="reset" name="Borrar" value="Borrar formulario" /></p></br>
            </form>
        </centre>   
    </body>
</html>