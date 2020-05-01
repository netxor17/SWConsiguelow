<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $params['app']->resuelve('/styles/style.css') ?>" />
  <title><?= $params['tituloPagina'] ?></title>
</head>
<body>

<div id="contenedor">
<?php
$params['app']->doInclude('common/cabecera.php');
//$params['app']->doInclude('comun/sidebarIzq.php');
?>
  <div id="contenido">
<?= $params['contenidoPagina'] ?>
  </div>
<?php
/*$params['app']->doInclude('common/sidebarDer.php');
$params['app']->doInclude('common/pie.php');*/
?>
</div>
</body>
</html>
