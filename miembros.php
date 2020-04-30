<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miembros</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
    
  <main>
    <h1>MIEMBROS</h1>
      <table style="width:100%">
        <tr>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Edad</th>
          <th>Aficiones</th>
        </tr>
        <tr>
          <td> <img src="img/nestor.png" alt="imagen no disponible" height=150 width=100></td>
          <td>Néstor </td>
          <td>Marín Gómez</td>
          <td>22</td>
          <td>Deporte, ropa, motos, el aire libre y no aburrirme</td>
        </tr>
        <tr>
          <td ><img src="img/IMG_20200226_170316_757.jpg" alt="imagen no disponible" height=150 width=100></td>
          <td>Alejandro</td>
          <td>Tabernero Pérez</td>
          <td>23</td>
          <td>Escuchar música, leer y salir de rave</td>
        </tr>
        <tr>
          <td ><img src="img/alvaro.png" alt="imagen no disponible" height=150 width=100></td>
          <td>Álvaro</td>
          <td>Abad de Donesteve</td>
          <td>26</td>
          <td>Rugby, gimnasio, cine</td>
        </tr>
        <tr>
          <td ><img src="Fenelchat.png" alt="imagen no disponible" height=150 width=100></td>
          <td>Taiyin</td>
          <td>Shao</td>
          <td>99</td>
          <td>rellenar a placer</td>
        </tr>
      </table> 
    </main>
    </div>
    <?php
       require("includes/common/sidebarDer.php");
       ?>
   </div>
   
</body>
</html>