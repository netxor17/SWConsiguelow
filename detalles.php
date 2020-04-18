<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
                <nav>
                    <ul>
                    <li><a href="index.php?">Inicio</a></li>
                    <li><a href="detalles.php">Detalles</a></li>
                    <li><a href="bocetos.php">Bocetos</a></li>
                    <li><a href="planificacion.php">Planificación</a></li>
                    <li><a href="miembros.php">Miembros</a></li>
                    <li><a href="contacto.php">Contacto</a></li> 
                    <li><a href="vender.php">Vender</a></li>
                    <li><a href="mostrarProducto.php">Mostrar productos</a></li>
                    <li><a href="busqueda.php">Buscar</a></li>
                    <li><a href="usuario.php">Mi cuenta</a></li>
                        <?php 
                    if (isset($_SESSION['login'])) {
                        if ($_SESSION['login']){
                            if (isset($_SESSION['username'])){
                                $nombre = $_SESSION['username'];
                                echo 'Hello ' . htmlspecialchars($nombre) . '! ';
                                echo  '<a href="logout.php">Logout</a>';
                            }
                        }
                     
                }
                else{
                    echo "Usuario desconocido. <a href='login.php'>Login</a>";  
                }
                ?>    
                </li>
            </ul>
        </nav>
    </header>
    <main>
            <h1>CONSIGUELOW</h1>
            <div>
                <h2>Introduccción</h2>
                <p>CONSIGUELOW está destinado a la subasta y al comercio electrónico de productos a través de Internet. Es la forma más fácil de poner en contacto a compradores 
                    y vendedores.  Los compradores visitan el sitio en búsqueda de los productos que desean, para lo cual eligen de entre una amplia variedad de vendedores 
                    individuales. Luego, hacen una oferta a través de una subasta específica. Debido a que es un sitio de subastas, CONSIGUELOW satisface a aquellos con un fuerte 
                    interés en productos específicos, como coleccionistas, distribuidores y vendedores.
                    Las personas que compran y venden productos en CONSIGUELOW son, por lo general, personas que buscan gangas, minoristas y emprendedores.
                    Cuenta con un gestor de ventas que ofrece servicios de administración de inventario, estadísticas de ventas, publicación de anuncios,
                    envío de correos electrónicos, emisión de votos e informe de pérdidas y ganancias. 
                </p>
                <h2>Opciones de compra: </h2>
                <p><strong>Formato tipo subasta: </strong>Deberás hacer ofertas junto con otros compradores a partir de una cantidad que supere el precio inicial del vendedor,
                     hasta obtener el mejor acuerdo. Puedes seguir el artículo para ver cómo marchan las ofertas.
                    Al finalizar el anuncio, el mejor postor adquirirá el artículo y completará la compra </p>
                <p><strong>¡Cómpralo ahora! </strong> Puedes comprar el artículo inmediatamente a un precio fijo. Esta también es una opción en los anuncios de subasta.
                    Si un vendedor ofrece esta opción, verás la opción ¡Cómpralo ahora! en los anuncios y en los resultados de la búsqueda.
                    </p>
                <p><strong>Carro de compras</strong> El carro de compras de CONSIGUELOW es una forma fácil de llevar un registro de varios artículos que están a precio fijo y que deseas comprar.
                    Cada vez que veas la opción ¡Cómpralo ahora! para un artículo que deseas comprar, puedes agregarlo a tu carro de compras.
                    </p>    
            </div>

            <div>
                <h2>Tipos de usuarios</h2>
                <p>En CONSIGUELOW se puede tanto realizar compras directas como subastas de productos y todo el mundo puede hacerlo solo con tener una cuenta de correo. Sin embargo, 
                    los verdaderos vendedores suman popularidad gracias a cada venta exitosa y esto hace que luego estos consigan más ventas por ser más seguros.
                    Puedes utilizar tu cuenta para comprar, vender, comunicarte con otros usuarios de CONSIGUELOW y dejar comentarios sobre compradores y vendedores.
                    Puedes iniciar sesión con tu nombre de usuario o la dirección de correo electrónico asociada con tu cuenta de CONSIGUELOW.</p>
                <p><strong>Usuario: </strong> Tiene permisos para administrar anuncios, comunicarse con otros usuarios realizar transacciones, comprar, pujar en subastas, valorar a otros usuarios,
                valorar transacciones, comentar anuncios,  y elegir a su propia comunidad de compradores y vendedores. </p>  
                <p><strong>Administrador: </strong> Pueden gestionar los anuncios de otros usuarios para controlar que estos cumplan con las normas del portal. Puden 
                también bloquear usuarios, ver e intervenir transacciones, y escribir comentarios y mensajes privados  </p>   
            </div>
            

            
    </main>
    <footer>

    </footer>
   
</body>
</html>