<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Mostrar tabla productos</title>
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