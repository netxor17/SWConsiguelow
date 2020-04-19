<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info pedido(s)</title>
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
                             <th>Nombre producto</th>
                             <th>Precio</th>
                             <th>Cantidad</th>
                             <th>Precio total</th>
                             <th>Talla</th>
                             <th>Color</th>
                             <th>Fecha Pedido</th>
                             <th>ID Pedido</th>
                             <th>ID Distribuidor</th>
                        </tr>
            
                     </thead>
                        <tbody>

            <?php
            $query= "SELECT * FROM detallespedido dp JOIN pedidos p ON dp.idPedido = p.numero JOIN usuario u ON u.dni = p.cliente"; 
            $resultado= $conexion ->query($query);
            
            echo "Mostrando datos de pedido(s) de " . htmlspecialchars($nombre);

            while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'usuario' de la bd
            ?>
            <tr>
            <td><?php echo $fila['idProducto']; ?></td> <!-- recoge info de la tabla 'productos' la columna 'nombre'-->
            <td><?php echo $fila['precio']; ?></td>
            <td><?php echo $fila['cantidad']; ?></td>
            <td><?php echo $fila['precioTotal'];?></td>
            <td><?php echo $fila['talla']; ?></td>
            <td><?php echo $fila['color']; ?></td>
            <td><?php echo $fila['fechaPedido']; ?></td>
            <td><?php echo $fila['idPedido']; ?></td>       
            <td><?php echo $fila['idDistribuidor']; ?></td>       
        </tr>
            <?php
            } //fin del while
        }
    }
}

            ?>
            </tbody>
        </table>
    </body>
</html>