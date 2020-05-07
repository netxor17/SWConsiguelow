<?php
    require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planificacion</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <div id="contenedor">
    <?php
        require("includes/common/cabecera.php");
        ?>
        <div id="flex-container">
     <?php
        require("includes/common/sidebarIzq.php");

    ?>      <div id="contenido">
   
        <h2>Tabla de usuarios y tareas</h2>
        <table style="width:100%">
          
          <tr>
            <th>Usuarios</th>
            <th>Entrega</th>
            <th>Tareas</th>
            <th>Fecha limite</th>
          </tr>
          <tr>
            <td>Alvaro</td>
            <td>
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Diseño del codigo, bocetos, detalles, contacto</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              </td>
            <td>28/02/2020
            <p>20/03/2020</p>
            <p>17/04/2020</p>
            <p>15/05/2020</p>
            </td>
          </tr>
          <tr>
            <td>Néstor</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Dibujar bocetos y diseño pagina web.</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
            </td>                      
            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          </tr>
          <tr>
            <td>Tai Yin</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>
              <p>Apoyo emocional </p>
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>

            </td>
            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          
          </tr>
          <tr>
            <td>Alejandro</td>
            <td> 
              <p>1.Descripcion proyecto</p>
              <p>2.Diseño aplicacion</p>
              <p>3.Diseño apariencia</p>
              <p>4.Entrega final</p>
            </td>
            <td>Diseño del estilo y gran parte de los documentos de la pagina web.
              <p>A rellenar</p>
              <p>A rellenar</p>
              <p>A rellenar</p>
            </td>
            

            <td>28/02/2020
              <p>20/03/2020</p>
              <p>17/04/2020</p>
              <p>15/05/2020</p>
              </td>
          </tr>
        </table>
    </div>
    <?php
       require("includes/common/sidebarDer.php");
       ?>
   </div>
 </div>
</body>
</html>