<?php namespace es\fdi\ucm\aw;
require_once __DIR__.'/includes/config.php';

    if(isset($_SESSION['username'])){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id= ".$id;
    $rs = $conn->query($query);
    if($rs){
        $fila = $rs->fetch_assoc();
        if(!isset($_SESSION['carrito'])){
            $array[0]['usuario'] = $_SESSION['username'];
            $array[0]['idProd']= $fila['id'];
            $array[0]['nombreProd']= $fila['nombre'];
            $array[0]['precio']= $fila['precio'];
            $array[0]['color']= $fila['color'];
            $array[0]['talla']= $fila['talla'];
            $array[0]['unidades']=1;
            $_SESSION['carrito']=$array;
        }
        else{
            $array = $_SESSION['carrito'];
            $cant = count($array);
            $array[$cant+1]['idProd'] = $fila['id'];
            $array[$cant+1]['usuario'] = $_SESSION['username'];
            $array[$cant+1]['nombreProd'] = $fila['nombre'];
            $array[$cant+1]['precio'] = $fila['precio'];
            $array[$cant+1]['color'] = $fila['color'];
            $array[$cant+1]['talla'] = $fila['talla'];
            $array[$cant+1]['unidades'] = 1;
            $_SESSION['carrito']=$array;
            }
     }
    header("Location: ./vistaCarrito.php");
}
    else{
        echo '<script type="text/javascript">
        alert("No has hecho login, se te mandará a login");
        window.location.assign("login.php");
        </script>';
}
    
