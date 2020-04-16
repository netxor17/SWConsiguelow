<?php

$conexion = new mysqli("localhost", "root", "", "tiendaonline");

if($conexion->connect_error){
	die("Conexion con base de datos fallida: " . $conexion->connect_error);
}
?>
<html>
    <body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Filtrar por...</title>
    <button type="button1" onclick="'muestraBusqueda.php'">Filtrar por precio</button>
    <button type="button2" onclick="ordenaPorNombre()">Filtrar por Nombre</button> <!--llamaria a miScript.js -->
    </body>
</html>