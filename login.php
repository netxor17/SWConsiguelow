<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/FormularioLogin.php';
use es\fdi\ucm\aw\FormularioLogin;
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inicio de sesión</title>
    </head>

    <body>
         <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
                <h1>Acceso al sistema</h1>
            <?php 
                $form = new FormularioLogin(); $form->gestiona();
            ?>
            </div>
         <?php
       require("includes/common/sidebarDer.php");
       ?>
   </div>  
    </body>
</html>