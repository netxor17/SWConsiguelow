<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miembros</title>
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
            <h1>MIEMBROS</h1>
            <table style="width:100%">
                    <tr>
                      <th>Foto</th>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Edad</th>
                      <th>Aficiones</th>
                    </tr>
                    <tr>
                      <td> <img src="nestor.png" alt="imagen no disponible" height=150 width=100></td>
                      <td>Néstor </td>
                      <td>Marín Gómez</td>
                      <td>22</td>
                      <td>Deporte, ropa, motos, el aire libre y no aburrirme</td>
                    </tr>
                    <tr>
                      <td ><img src="IMG_20200226_170316_757.jpg" alt="imagen no disponible" height=150 width=100></td>
                      <td>Alejandro</td>
                      <td>Tabernero Pérez</td>
                      <td>23</td>
                      <td>Escuchar música, leer y salir de rave</td>
                    </tr>
                    <tr>
                      <td ><img src="alvaro.png" alt="imagen no disponible" height=150 width=100></td>
                      <td>Álvaro</td>
                      <td>Abad de Donesteve</td>
                      <td>26</td>
                      <td>Rugby, gimnasio, cine</td>
                    </tr>
                    <tr>
                      <td ><img src="IMG_20200226_170316_757.jpg" alt="imagen no disponible" height=150 width=100></td>
                      <td>Taiyin</td>
                      <td>Shao</td>
                      <td>99</td>
                      <td>rellenar a placer</td>
                    </tr>
                  </table> 
    </main>
    <footer>

    </footer>
   
</body>
</html>