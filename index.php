<?php
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div id="container">

    <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
                
                <p>Cada vez más gente compra mediante <strong>internet</strong>, debido a que hay muchísima
                    variedad de productos y es mucho mas cómodo, ya que no hay que moverse
                    de casa. Nuestro proyecto consiste en una página web estilo Ebay, en la que se
                    puedan comprar productos de primera y segunda mano. Habrá un sistema de
                    valoraciones de vendedores y comentarios en productos para que el
                    comprador se pueda guiar a la hora de comprar. Se podrá añadir productos a
                    favoritos, filtrar las búsquedas según precio, comentarios, número de unidades
                    vendidas.</p>
                <div class="logo">
                    <img src="img/logo.gif" alt="imagen no disponible">
                </div>
            </div>
    <?php
       require("includes/common/sidebarDer.php");
       ?>
   </div>
</div>
    <footer>

    </footer>
   
</body>
</html>