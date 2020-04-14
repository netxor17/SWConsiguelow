<?php
include('funciones.inc');
//NOTA: crear un usuario para el sitio web
function usuario_existe($username, $passwd){
    //$conexion = new mysqli("localhost", "usuario", "contraseña", "basedatos");
    $conexion = new mysqli("", "root","", "tiendaonline" );
   // mysqli_select_db($conexion, );
    if (mysqli_connect_errno()){
        echo 'Error de conexión a la BD: ' .mysqli_connect_error();
        exit();
    }
    else{
        echo '<p>Conexión con la BD realizada con éxito</p>';
    }

    $query = "SELECT * FROM usuario WHERE nombre = '$username'";
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

    //header('location: '.url('index.php'));
        exit;
    }else{  //no exite --> mensaje de error
        $mensaje = 'Identificación incorrecta. ';
        $mensaje .= 'Vuelva a intentarlo.';
        //dejar que el formulario se muestre de nuevo
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inicio de sesión</title>
    </head>

    <body>
        <form action="login.php" method="post">
            <p>Escribe tu nombre:
            <input type="text" name="username" value="" />
            password
            <input type="password" name="password" value="" />
</p>
           <p> <input type="submit" name="enviar" value="Enviar" />
            <input type="reset" name="Borrar" value="Borrar formulario" /></p>
        <?php echo $mensaje; ?>
    </body>
</html>