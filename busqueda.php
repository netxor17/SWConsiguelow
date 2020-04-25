<?php
require_once __DIR__.'/includes/config.php';
//include('vender.php');
 //recibo datos introducidos y los almaceno en variables
//$ = mysqli_query($conexion,$usuario); //$usuario es el nombre de usuario de la sesion

/*$query= "SELECT * FROM productos"; //hago un query y muestro todas las filas de la tabla 'productos'
$resultado= $conexion ->query($query);
while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'productos' de la bd
    */

$conexion = new mysqli("localhost", "root", "", "tiendaonline");
if($conexion->connect_error){
	die("Conexion con base de datos fallida: " . $conexion->connect_error);
}
?>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Realizar busqueda</title>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Mostrar Busqueda</title>
    <form action="muestraBusqueda.php" method="POST" enctype="multipart/form-data">   <!-- formulario para rellenar los campos -->
    <input type="text" name="nombreProd" placeholder="Buscar por nombre..." value="" /></br></br>
    <input type="text" name="nombreCategoria" placeholder="Buscar por categoria..." value="" /></br></br> 
    <input type="text" name="nombreVendedor" placeholder="Buscar por vendedor..." value="" /></br></br>
    <input type="submit" name="enviar" value="Enviar" /></br></br>
    <input type="reset" name="Borrar" value="Borrar formulario" /></p></br>
    </form> 
    </body>
</html>