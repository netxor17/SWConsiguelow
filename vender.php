<?php
include('login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Vender producto</title>
    </head>
    <body>
        <centre>
        <form action="anadir.php" method="POST" enctype="multipart/form-data">   <!-- formulario para rellenar los campos -->
            <input type="text" REQUIRED name="nombreProducto" placeholder="Nombre del producto.." value="" /></br></br>  <!-- REQUIRED significa campo obligatorio -->
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="text" REQUIRED name="precio" placeholder="Precio producto.." value="" /></br></br>
            <input type="text" REQUIRED name="unidades" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="text" REQUIRED name="talla" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="text" REQUIRED name="color" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="text" REQUIRED name="categoria" placeholder="Descripcion producto.." value="" /></br></br>
            <input type="file" name="imagen" /></br></br>
            <input type="submit" name="enviar" value="Enviar" /></br></br>
            <input type="reset" name="Borrar" value="Borrar formulario" /></p></br>
        </form>
        </centre>
    </body>
</html>