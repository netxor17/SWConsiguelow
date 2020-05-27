<?php
namespace es\fdi\ucm\aw;
//require_once __DIR__ . '/Aplicacion.php';
require_once __DIR__ . '/funciones.inc';


class Usuario
{

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            echo "dentro del if";
            return $user;
        }
        return false;
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Usuarios U WHERE U.nombreUsuario = '%s'", $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['nombre'], $fila['nombreUsuario'], $fila['password'], $fila['dni'],  $fila['direccion'],  $fila['email'],  $fila['telefono'],  $fila['ciudad'],  $fila['codigo postal'],  $fila['carrito'], $fila['tarjeta credito'] );
                $user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($nombre, $nombreUsuario, $password,  $dni, $direccion, $email, $telefono, $ciudad, $codigoPostal, $tarjetaCredito)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombre, $nombreUsuario, self::hashPassword($password),  $dni, $direccion, $email, $telefono, $ciudad, $codigoPostal, $tarjetaCredito);
        return self::guarda($user);
    }
    

    public static function muestraInfo($usuario){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Usuarios U WHERE U.nombreUsuario = '$usuario'", $conn->real_escape_string($usuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $array[0]['usuario'] = $fila['nombreUsuario'];
                $array[0]['direccion'] = $fila['direccion'];
                $array[0]['telefono'] = $fila['telefono'];
                $array[0]['email'] = $fila['email'];
                $array[0]['cp'] = $fila['codigo postal'];
                $array[0]['ciudad'] = $fila['ciudad'];
                $user= $array;
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        //console_log($usuario);
        $query=sprintf("INSERT INTO `usuarios` (`dni`, `nombre`, `nombreUsuario`, `password`, `direccion`, `email`, `telefono`, `ciudad`, `codigo postal`, `carrito`, `tarjeta credito`) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%i', '%i')"
            , $conn->real_escape_string($usuario->dni)    
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->direccion)
            , $conn->real_escape_string($usuario->email)
            , $conn->real_escape_string($usuario->telefono)
            , $conn->real_escape_string($usuario->ciudad)
            , $conn->real_escape_string($usuario->codigoPostal)
            , $conn->real_escape_string($usuario->carrito)
            , $conn->real_escape_string($usuario->tarjetaCredito));

        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Usuarios U SET nombre='%s', password='%s', nombreUsuario='%s',  dni='%s', direccion='%s', email='%s', telefono='%s', ciudad='%s', codigo postal='%s', carrito='%i', trajeta credito='%i'   WHERE U.id=%i"
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->direccion)
            , $conn->real_escape_string($usuario->email)
            , $conn->real_escape_string($usuario->direccion)
            , $conn->real_escape_string($usuario->telefono)
            , $conn->real_escape_string($usuario->codigoPostal)
            , $conn->real_escape_string($usuario->carrito )
            , $conn->real_escape_string($usuario->tarjetaCredito )
            , $usuario->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }

    
    private $id;

    private $password;

    private $dni;

    private $direccion;

    private $email;

    private $telefono;

    private $ciudad;

    private $codigoPostal;

    private $carrito;

    private $tarjetaCredito;

    private $nombreUsuario;


    private function __construct($nombre, $nombreUsuario, $password,  $dni, $direccion, $email, $telefono, $ciudad, $codigoPostal, $tarjetaCredito )
    {
        $this->nombre = $nombre;
        $this->nombreUsuario= $nombreUsuario;
        $this->password = $password;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigoPostal;
        $this->carrito = 0; //new carrito
        $this->tarjetaCredito = $tarjetaCredito;
    }

    public function id()
    {
        return $this->id;
    }

    public function password()
    {
        return $this->password;
    }

    public function nombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function dni()
    {
        return $this->dnis;
    }

    public function direccion()
    {
        return $this->direccion;
    }

    public function email()
    {
        return $this->email;
    }

    public function telefono()
    {
        return $this->telefono;
    }

    public function ciudad()
    {
        return $this->ciudad;
    }

    public function codigoPostal()
    {
        return $this->codigoPostal;
    }

    public function nombre()
    {
        return $this->nombre;
    }

    public function carrito()
    {
        return $this->carrito;
    }

    public function compruebaPassword($password)
    {
       /* echo $password;
        echo "<br>";
        
        echo $this->password;
        echo "<br>";*/

        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}
