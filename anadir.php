<?php
include('login.php');
 //recibo datos introducidos y los almaceno en variables
//$idProducto = mysqli_query($conexion,$usuario); //$usuario es el nombre de usuario de la sesion
$nombreProd = $_POST["nombreProducto"];
$descripcion =$_POST["descripcion"];
$queryidVendedor = "SELECT idVendedor FROM productos";
$idVendedor =$conexion->query($queryidVendedor);//recibo idVendedor de fuera
$precio =$_POST["precio"];
$unidades =$_POST["unidades"];
$talla =$_POST["talla"];
$color =$_POST["color"];
$categoria =$_POST["categoria"];
$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); //para añadir la imagen

$agotado = false; //duda
$reseña = null; //duda
$numEstrellas=null; //duda
$tallasDisponibles += $talla; //duda si esta bien 
$coloresDisponibles += $color; //sumo los colores
$unidadesDisponibles +=$unidades; //sumo las unidades que voy insertando 

// consulta para insertar valores
$insertar= "INSERT INTO productos (id,idVendedor,nombre,descripcion,precio,unidadesDisponibles,tallasDisponibles,coloresDisponibles,talla,color, categoria, agotado, reseña, numEstrellas,imagen) 
VALUES ('$usuario','$idVendedor','$nombreProd','$descripcion','$precio','$unidadesDisponibles','$tallasDisponibles','$coloresDisponibles','$talla','$color','$categoria','$agotado','$reseña','$numEstrellas','$imagen')";
//ejecuta consulta
$resultado = $conexion->query($insertar);
 if(!$resultado){
     echo 'error al subir producto';
 }
 else{
     echo'archivo subido con exito';
 }

?>
