<?php
    session_start();
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Mostrar Busqueda</title>
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
        </nav></br>
        <centre>
        <table>
         <thead>
            <tr>
                 <th>Imagen</th>
                 <th>Nombre</th>
                 <th>Descripcion</th>
                 <th>Precio</th>
                 <th>Unidades</th>
                 <th>Talla</th>
                 <th>Color</th>
                 <th>Categoria</th>
            </tr>

            <?php
            //session_start();
            $conexion = new mysqli("localhost", "root", "", "tiendaonline");

            $nombreProd = $_POST["nombreProd"];
            $categoriaBuscada=$_POST["nombreCategoria"];
            $buscarPorNombre= "SELECT * FROM productos WHERE nombre LIKE '$nombreProd%'"; //hago un query y muestro todas las filas de la tabla 'productos'
            $buscarPorCategoria="SELECT * FROM productos p JOIN categoria c ON p.categoria = c.tipo WHERE p.categoria LIKE '$categoriaBuscada%'"; //JOIN ON 
            $buscadoNombre = $conexion ->query($buscarPorNombre);
            $buscadoCategoria = $conexion ->query($buscarPorCategoria);

            //while($fila=$buscadoNombre->fetch_assoc() || $fila=$buscadoCategoria->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'productos' de la bd
            if ($buscadoNombre){
                if ( $buscadoNombre->num_rows == 0) {
                    echo "No hay resultados que coincidan con tu busqueda";
                    $buscadoNombre->free();
                }
            elseif (strlen($nombreProd)>0 && $buscadoNombre->num_rows > 0 ){
                $fila=$buscadoNombre->fetch_assoc() ;
                echo " Mostrando productos por nombre \n" ;
                include('filtrar.php'); //filtrar por precio, valoraciones...
            ?> </br>
        <tr></br>
        <td><img height="50px" src="data:image/jpeg;base64,<?php echo base64_encode($fila['imagen']); ?>"/></td> <!-- muestro la imagen-->
        <td><?php echo ($fila['nombre']); ?></td> <!-- recoge info de la tabla 'productos' la columna 'nombre'-->
        <td><?php echo ($fila['descripcion']); ?></td>
        <td><?php echo ($fila['precio']); ?></td>
        <td><?php echo($fila['unidadesDisponibles']);?></td>
        <td><?php echo ($fila['talla']); ?></td>
        <td><?php echo ($fila['color']); ?></td>
        <td><?php echo ($fila['categoria']); ?></td>
        </tr>
        <?php
            }
         } //fin del if
         if(strlen($categoriaBuscada)>0){
             /*if(!$fila=$buscadoCategoria->fetch_assoc()){
                echo "No se han encontrado resultados relacionados a tu busqueda por categoria";
             } */
                $fila=$buscadoCategoria->fetch_assoc();
                echo "mostrando productos por categoria";

        ?>
        <tr></br>
        <td><img height="50px" src="data:image/jpeg;base64,<?php echo base64_encode($fila['imagen']); ?>"/></td> <!-- muestro la imagen-->
        <td><?php echo ($fila['nombre']); ?></td> <!-- recoge info de la tabla 'productos' la columna 'nombre'-->
        <td><?php echo ($fila['descripcion']); ?></td>
        <td><?php echo ($fila['precio']); ?></td>
        <td><?php echo($fila['unidadesDisponibles']);?></td>
        <td><?php echo ($fila['talla']); ?></td>
        <td><?php echo ($fila['color']); ?></td>
        <td><?php echo ($fila['categoria']); ?></td>
        </tr>
        </tbody>
        </table>
    <?php
             }    
        //} //fin if 
    ?>
    </centre>
    </body>
</html>

