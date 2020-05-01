<?php
require_once __DIR__.'/includes/config.php';
use es\fdi\ucm\aw\FormularioLogin;

$formLogin = new FormularioLogin();
$formLogin = $formLogin->gestiona();


$tituloPagina = 'Login';
$contenidoPagina=<<<EOF
  	<h1>Acceso al sistema</h1>
    $formLogin
EOF;

$params = ['tituloPagina' => $tituloPagina, 'contenidoPagina' => $contenidoPagina];
$app->generaVista('comun/plantilla.php', $params);

/*?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inicio de sesión</title>
    </head>

    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Acceso al sistema</h1>
            <?php 
                $form = new FormularioLogin(); $form->gestiona();
            ?>
            </div>
        </div>  
    </body>
</html>*/