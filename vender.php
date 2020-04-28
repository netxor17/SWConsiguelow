<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioVender;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Subir un producto</title>
    </head>
    <body>
        <header>
        <?php
        require("includes/common/cabecera.php");
         ?>
    </header>
    <body>
    <?php 
    $form = new FormularioVender(); $form->gestiona();
    ?>
    </body>
</html>