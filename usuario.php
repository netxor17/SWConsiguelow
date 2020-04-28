<?php
    session_start();
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de pedido</title>
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
            
    </main>
   
</body>
</html>