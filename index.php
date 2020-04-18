<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
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

                    <!-- <li><a href="mostrarProducto.php">Mostrar productos</a></li>-->
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
            <?php echo 'Hello ' . htmlspecialchars($nombre) . '!';?>
            <p>Cada vez más gente compra mediante <strong>internet</strong>, debido a que hay muchísima
                variedad de productos y es mucho mas cómodo, ya que no hay que moverse
                de casa. Nuestro proyecto consiste en una página web estilo Ebay, en la que se
                puedan comprar productos de primera y segunda mano. Habrá un sistema de
                valoraciones de vendedores y comentarios en productos para que el
                comprador se pueda guiar a la hora de comprar. Se podrá añadir productos a
                favoritos, filtrar las búsquedas según precio, comentarios, número de unidades
                vendidas.</p>
            <div class="logo">
                <img src="logo.gif" alt="imagen no disponible">
            </div>
    </main>
    <footer>

    </footer>
   
</body>
</html>