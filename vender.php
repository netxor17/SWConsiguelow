<?php
//include('login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Vender producto</title>
    </head>
    <header>
                <nav>
                    <ul>
                    <li><a href="index.php?">Inicio</a></li>
                    <li><a href="detalles.html">Detalles</a></li>
                    <li><a href="bocetos.html">Bocetos</a></li>
                    <li><a href="planificacion.html">Planificación</a></li>
                    <li><a href="miembros.html">Miembros</a></li>
                    <li><a href="contacto.html">Contacto</a></li> 
                    <a href="vender.php">Vender</a>
                    <a href="mostrarProducto.php">Mostar productos</a></ul>
                    </ul>
                </nav>
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
            <input type="file" REQUIRED name="imagen" /></br></br>
            <input type="submit" name="enviar" value="Enviar" /></br></br>
            <input type="reset" name="Borrar" value="Borrar formulario" /></p></br>
            </form>
        </centre>   
    </body>
</html>