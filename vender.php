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
        <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
            <form action="anadir.php" method="POST" enctype="multipart/form-data">   <!-- formulario para rellenar los campos -->
            <input type="text" REQUIRED name="nombreProducto" placeholder="Nombre del producto.." value="" />  <!-- REQUIRED significa campo obligatorio -->
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion producto.." value="" />
            <input type="text" REQUIRED name="precio" placeholder="Precio producto.." value="" />
            <input type="text" REQUIRED name="unidades" placeholder="Unidades.." value="" />
            <select name="talla">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
            <input type="color" name="color"/>
            <input type="text" REQUIRED name="categoria" placeholder="Categoria.." value="" />
            <input type="file" name="imagen" />
            <input type="submit" name="enviar" value="Enviar" />
            <input type="reset" name="Borrar" value="Borrar formulario" />
            </form>
        </div>
        <?php
       require("includes/common/sidebarDer.php");
       ?>
    </div>
    </div>
</body>
</html>