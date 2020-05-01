<?php
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<!--link rel="stylesheet" type="text/css" href="estilo.css" /-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contacto</title>
<link rel="stylesheet" href="styles/style.css">
</head>

<body>
   <div id="container">

    <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
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
    </div>
    <?php
       require("includes/common/sidebarDer.php");
       ?>
   </div>
</div>
</body>
</html>