<?php
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bocetos</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
    <?php
    require("includes/common/cabecera.php");
  ?>
    </header>
    <main>
        <p>Descripciones al pie de cada imagen</p>
        
        <img src="Bocetos/Boceto1.png" height=1169 width=850  alt="imagen no disponible">
        
            <h2>Página principal:</h2> <p>la página principal contiene un banner en la cabecera con el logo característico del portal. Debajo hay una
            barra de búsqueda, y a su derecha un enlace al login, y si el usuario está logueado, el logout y los logotipos de subasta y carrito .
            Debajo, en el contenido principal se sugieren algunos productos.
            En el menú izquierdo, tenemos todas las opciones: Compra directa, subasta, vender, comprar y monedero.
        </p>
        <h2>Login: </h2> <p>Formulario de login clásico con los colores corporativos</p>

        <img src="Bocetos/Boceto2.png" height=1169 width=850  alt="imagen no disponible">
        
            
        <h2>Carrito: </h2>
        <p>Contiene el listado de los productos añadidos al carrito para el usuario, con una foto, el título y el precio.
        Contiene botones para comprar individualmente y para comprar todos los productos del carrito. En la esquina superior derecha
        aparece el botón de monedero para acceder a nuestra información económica, y el de nuestro perfil. 
        </p>

        <h2>Subastas: </h2> <p>Si hemos pulsado el botón de subastas accedemos al buscador de productos en subasta, que contiene una barra de búsqueda
            , y sugerencias de productos con foto, nombre, descripción, precio, valoración del vendedor y tiempo restante de subasta.
            Además en la cabecera tenemos enlaces al carrito, o en caso de de haber accedido sin loguear, un enlace al login</p>

        <img src="Bocetos/Boceto3.png" height=1169 width=850  alt="imagen no disponible">
        
            <h2>Resultado de búsqueda de producto:</h2> <p>al haber buscado desde la barra, una nueva vista muestra el 
            listado de los resultados. Aparece también una opción para añadir filtros de búsqueda, la barra para una nueva búsqueda, 
            y los botones clásicos de carrito, perfil y monedero.
        </p>
        <h2>Producto: </h2> <p>Al pinchar sobre la foto de un producto accedemos a la vista individual del mismo.
            Esta vista contiene muestra las fotos una a una, con botones para pasar a siguiente imagen, y toda la descripción detallada.</p>

        <img src="Bocetos/Boceto4.png" height=1169 width=850  alt="imagen no disponible">
        
            <h2>Menú de vendedor:</h2> <p>(ignorar lo de sesión con cuenta de vendedor). Habiendo pinchado sobre vender, accedemos al menú del vendedor.
            Este menú muestra nuestros anuncios, y encima un input para introducir opcionalmente un ISBN, ePID, UPC o nombre de producto para 
            empezar con la venta de un producto. 
        </p>   
        <h2>Formulario de anuncio de venta: </h2> <p>Tras pinchar en la vista anterior en empezar, nos aparece este formulario con 
            los datos obligatorios a introducir para crear el anuncio.
            </p>  

         <img src="Bocetos/Boceto5.png" height=1169 width=850  alt="imagen no disponible"> 
         <h2>Añadir valoración:</h2> <p>en este apartado se deja una valoración con comentario(opcional) sobre un producto. Consiste del nombre del producto como título, un recuadro para escribir el texto opcional, un cuadro con 5 botones para representar la valoración, una opción de subida de fotos del producto(opcional), el botón para enviar y el botón de cancelar que borrará el formulario.
        </p>   
        <h2>Menú de Mi cuenta:</h2> <p>en esta página aparecerá una serie de información sobre la cuenta del usuario
            </p>  
        <img src="Bocetos/Boceto6.png" height=1169 width=850  alt="imagen no disponible"> 
        <h2>Ofertas:</h2> <p>Funcionalmente es similar a la página de inicio, pero con la diferencia que todos los productos que aparecen estarán de oferta
        </p>   
        
    </main>
 
   
</body>
</html>