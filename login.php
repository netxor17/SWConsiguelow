<?php
include('funciones.inc');

function usuario_existe($username, $passwd){
    $conexion = new mysqli("", "root", "", "consiguelowdb");
    if (mysqli_connect_errno()){
        echo "Errro de conexión a las base de datos: " .mysqli_connect_error();
        exit();
    }
    $query = "SELECT 1 FROM user WHERE username = '$username' AND password = '$passwd';";
    $result = $conexion->query($query) or die ($conexion->error. " en la línea ".(__LINE__-1));
    $existe = FALSE;
    if ($result->num_rows){
        $existe = TRUE;
    }

    return (bool) $existe;
}

$username ='';
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
        $_SESSION['login'] = TRUE;

        header('location: '.url('index.php'));
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
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inicio de sesión</title>
    </head>

    <body>
        <form action="login.php" method="post">
            Escribe tu nombre:
            <input type="text" name="username" value="" />
            Contraseña
            <input type="password" name="password" value="" />
            <input type="submit" name="enviar" value="Enviar" />
            <input type="reset" name="Borrar" value="Borrar formulario" />
        <?php echo $mensaje; ?>
    </body>
</html>