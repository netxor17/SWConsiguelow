<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario</title>
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
                    </ul>
                        <?php 
                        session_start();
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
                    echo "No has iniciado sesion aun ";
                     ?> <a href='login.php'>Login</a> 
                     <?php
                }
  

            $conexion = new mysqli("localhost", "root", "", "tiendaonline");

            if (isset($_SESSION['login'])) {
                if ($_SESSION['login']){
                    if (isset($_SESSION['username'])){
                        ?>
                        </nav>
                        </header>  
                        <centre>
                    <table>
                     <thead>
                        <tr>
                             <th>DNI</th>
                             <th>Nombre</th>
                             <th>Direccion</th>
                             <th>E-mail</th>
                             <th>Telefono</th>
                             <th>Ciudad</th>
                             <th>Codigo Postal</th>
                             <th>Carrito</th>
                        </tr>
            
                     </thead>
                        <tbody>

            <?php
            $query= "SELECT * FROM usuario u WHERE u.nombre = '$nombre'"; 
            $resultado= $conexion ->query($query);
            
            echo "Mostrando datos del usuario " . htmlspecialchars($nombre);

            while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'usuario' de la bd
            ?>
            <tr>
            <td><?php echo $fila['dni']; ?></td> <!-- recoge info de la tabla 'productos' la columna 'nombre'-->
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['direccion']; ?></td>
            <td><?php echo $fila['email'];?></td>
            <td><?php echo $fila['telefono']; ?></td>
            <td><?php echo $fila['ciudad']; ?></td>
            <td><?php echo $fila['codigo postal']; ?></td>
            <td><?php echo $fila['carrito']; ?></td>       
        </tr>
            <?php
            } //fin del while
        }
    }
}
        echo 'Mstrar pedidos';
            ?> 
            <a href="detallesPedido.php">Detalles pedidos</a>
            </tbody>
        </table>
    </body>
</html>