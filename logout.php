<?php
require_once __DIR__.'/includes/config.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Portada</title>
    </head>

	<body>
        <?php
            
            unset($_SESSION['username']);
            unset($_SESSION['login']);
            //unset($_SESSION['esAdmin']);
            session_destroy();
            echo 'Tu sesión ha finalizado'; 
        ?>
            <a href="index.php">Portada</a>
	</body>
</html>
