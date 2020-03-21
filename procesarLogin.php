<?php
include('funciones.inc');
//NOTA: crear un usuario para el sitio web
function usuario_existe($username, $passwd){
    $conexion = new mysqli("", "root","", "consiguelowdb" );
   // mysqli_select_db($conexion, );
    if (mysqli_connect_errno()){
        echo 'Error de conexión a la BD: ' .mysqli_connect_error();
        exit();
    }
    else{
        echo '<p>Conexión con la BD realizada con éxito</p>';
    }

    $query = "SELECT * FROM user WHERE username = '$username'";
   // $query .= "WHERE username = $username AND password = $passwd";
    $result = $conexion->query($query) or die ($conexion->error. " en la línea ".(__LINE__-1));
    $numregs = $result->num_rows;

    $existe= NULL;
    if ($numregs){
        echo 'Login correcto';
        $existe = true;
    }else{
        $existe = FALSE;
    }

    return (bool) $existe;
}


$id ='';
$passwd='';
$mensaje='';
//procesamiento del formulario
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $passwd = $_POST['password'];

    if (usuario_existe($username, $passwd)){
        session_start();
        $_SESSION['fecha'] = date ("\e\l d/m/Y a las H:i:s");
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;

        header('location: '.url('index.php'));
        exit;
    }else{  //no exite --> mensaje de error
        $mensaje = 'Identificación incorrecta. ';
        $mensaje .= 'Vuelva a intentarlo.';
        //dejar que el formulario se muestre de nuevo
    }
}
?>
