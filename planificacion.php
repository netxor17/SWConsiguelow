<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planificacion</title>
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
        <h2>Tabla de usuarios y tareas</h2>
        <table style="width:100%">
          
          <tr>
            <th>Usuarios</th>
            <th>Entrega</th>
            <th>Tareas</th>
            <th>Fecha limite</th>
          </tr>
          <tr>
            <td>Alvaro</td>
            <td>
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Diseño del codigo, bocetos, detalles, contacto</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              </td>
            <td>28/02/2020
            <p>20/03/2020</p>
            <p>17/04/2020</p>
            <p>15/05/2020</p>
            </td>
          </tr>
          <tr>
            <td>Néstor</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Dibujar bocetos y diseño pagina web.</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
            </td>                      
            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          </tr>
          <tr>
            <td>Tai Yin</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Apoyo emocional </p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>

            </td>
            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          
          </tr>
          <tr>
            <td>Alejandro</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>Diseño del estilo y gran parte de los documentos de la pagina web.
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
            </td>
            

            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          </tr>
        </table>
    </main>
    <footer>

    </footer>
   
</body>
</html>