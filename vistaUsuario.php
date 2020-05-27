<?php 
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\Usuario;
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Detalles usuario</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Detalles usuario</h1>
                <?php
                if(!isset($_SESSION['login'])){
                    echo '<script type="text/javascript">
                     alert("No has hecho login, se te mandará a login");
                     window.location.assign("login.php");
                     </script>';
                     
                 }
                 else{
                     ?>
                    <li>Mostrando datos del usuario: <?php echo $_SESSION['username'];?></li></br>
                    <?php
                    $usuario = $_SESSION['username'];
                    $result = Usuario::muestraInfo($usuario);
                    $array = $result;
                    foreach($array as $key => $fila){
                    ?>
                    <li>Usuario: <?php echo $fila['usuario'];?></br>
                    <li>Direccion: <?php echo $fila['direccion'];?></br>
                    <li>Ciudad donde vive: <?php echo $fila['ciudad'];?></br>
                    <li>Codigo Postal: <?php echo $fila['cp'];?></br>
                    <li>Email de contacto: <?php echo $fila['email'];?></br>
                    <?php
                     }
                    }
                    ?>
                    <li>Pedidos del usuario: <?php echo $_SESSION['username'];?></li></br>
                    <a href="vistaPedidos.php">Pedidos</a>
            </div>
        </div>
    </body>
</html>