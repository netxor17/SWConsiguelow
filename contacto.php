<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<!--link rel="stylesheet" type="text/css" href="estilo.css" /-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contacto</title>
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
        <h2>Send e-mail to someone@example.com:</h2>

        <form action="mailto:someone@example.com" method="post" enctype="text/plain">
            <p>
                <label>Name:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label>E-mail:</label>
                <input type="text" name="mail">
            </p>
            
            
                <p>Motivo de la consulta:</p>
                <input type="radio" name="motivo" value="evaluacion">
                <label>Evaluación</label><br>
                
                <input type="radio" name="motivo" value="sugerencias">
                <label >Sugerencias</label><br>
                
                <input type="radio" name="motivo" value="criticas">
                <label >Críticas</label>
           

            <p>
            <input type="checkbox" name="leido" value="true">
            <label> Marque esta casilla pra verificar que ha leído nuestros términos y condiciones del servicio</label>
            </p>

            <p>        
                <label>Escribe aquí tu consulta:</label>
            </p>

            <textarea rows="4" cols="50">
                
            </textarea>
        </form>
    </main>
</body>
</html>
