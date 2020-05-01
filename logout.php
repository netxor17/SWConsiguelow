<?php
require_once __DIR__.'/includes/config.php';

$app->logout();


$tituloPagina = 'Logout';
$contenidoPagina=<<<EOF
  	<h1>Hasta pronto !</h1>
EOF;


$params = ['tituloPagina' => $tituloPagina, 'contenidoPagina' => $contenidoPagina];
$app->generaVista('common/plantilla.php', $params);

/*?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Cerrar sesion</title>
    </head>
    <body>
        <div id="contenedor">
            <?php
                require("includes/common/cabecera.php");
            ?>
            <div id="contenido">
                <h1>Cerrar sesion</h1>
            <?php
            unset($_SESSION['username']);
            unset($_SESSION['login']);
            //unset($_SESSION['esAdmin']);
            session_destroy();
            echo 'Tu sesión ha finalizado'; 
        ?>
            <a href="index.php">Portada</a>
	</body>
</html>*/
