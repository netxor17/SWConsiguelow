<?php
//include('vender.php');
 //recibo datos introducidos y los almaceno en variables
//$ = mysqli_query($conexion,$usuario); //$usuario es el nombre de usuario de la sesion

/*$query= "SELECT * FROM productos"; //hago un query y muestro todas las filas de la tabla 'productos'
$resultado= $conexion ->query($query);
while($fila=$resultado->fetch_assoc()){ //mientras se haya podido recoger una fila de la tabla 'productos' de la bd
    */

$conexion = new mysqli("localhost", "root", "", "tiendaonline");

$nombreProd = $_POST["nombreProducto"];
$descripcion =$_POST["descripcion"];
$queryidVendedor = "SELECT idVendedor FROM vendedores WHERE idVendedor = '1'";
$idVendedor =$conexion->query($queryidVendedor);//recibo idVendedor de fuera
//$queryUsuario="SELECT nombre FROM usuario where nombre = 'Nestor'";
//$idUsuario= $conexion->query($queryUsuario);
$precio =$_POST["precio"];
$unidades=$_POST["unidades"];
$talla =$_POST["talla"];
$color =$_POST["color"];
$categoria =$_POST["categoria"];
$imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); //para añadir la imagen

$agotado = false; //duda
$reseña = ''; //duda
$numEstrellas= 0 ; //duda
$tallasDisponibles = $talla; //duda si esta bien 
$coloresDisponibles = $color; //sumo los colores
$unidadesDisponibles =$unidades; //sumo las unidades que voy insertando 

// consulta para insertar valores
$insertar= "INSERT INTO productos (idVendedor,nombre,descripcion,precio,unidadesDisponibles,tallasDisponibles,coloresDisponibles,talla,color, categoria, agotado, reseña, numEstrellas,imagen) 
VALUES ('$idVendedor','$nombreProd','$descripcion','$precio','$unidadesDisponibles','$tallasDisponibles','$coloresDisponibles','$talla','$color','$categoria','$agotado','$reseña','$numEstrellas','$imagen')";
//ejecuta consulta
$resultado = $conexion->query($insertar);
 if(!$resultado){
     echo 'error al subir producto';
    echo '<li><a href="mostrarProducto.php">Mostrar productos ya existentes</a></li>';

 }
 else{
     echo 'archivo subido con exito';
     echo '<li><a href="mostrarProducto.php">Mostrar producto</a></li>';
 }

?>