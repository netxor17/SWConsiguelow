<?php
namespace es\fdi\ucm\aw;
//require_once __DIR__.'/Form.php';
//require_once __DIR__.'/Usuario.php';*/

class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        $nombre = '';
        $dni = '';
        $direccion = '';
        $email = '';
        $nombre = '';
        $telefono = '';
        $ciudad = '';
        $codigoPostal = ''; 
        $tarjetaCredito = '';

        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : $nombre;
        }
        $html = <<<EOF
		<fieldset>
			<div class="grupo-control">
				<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="$nombreUsuario" />
			</div>
			<div class="grupo-control">
				<label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="$nombre" />
			</div>
			<div class="grupo-control">
				<label>Password:</label> <input class="control" type="password" name="password" />
			</div>
			<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br /></div>
            
            <div class="grupo-control">
                <label>dni:</label> <input class="control" type="text" name="dni" value="$dni" />
            </div>
            <div class="grupo-control">
                <label>direccion:</label> <input class="control" type="text" name="direccion" value="$direccion" />
            </div>
            <div class="grupo-control">
                <label> email:</label> <input class="control" type="text" name="email" value="$email" />
            </div>
            <div class="grupo-control">
                <label>telefono:</label> <input class="control" type="text" name="telefono" value="$telefono" />
            </div>
            <div class="grupo-control">
                <label>ciudad:</label> <input class="control" type="text" name="ciudad" value="$ciudad" />
            </div>
            <div class="grupo-control">
                <label>codigo postal:</label> <input class="control" type="text" name="codigoPostal" value="$codigoPostal" />
             </div>
            <div class="grupo-control">
                <label>tarjeta credito:</label> <input class="control" type="text" name="tarjetaCredito" value="$tarjetaCredito" />
            </div>


            
            <div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
		</fieldset>
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
        
        if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
            $result[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }
        $dni = isset($datos['dni']) ? $datos['dni'] : null;
        if ( empty($dni)) {
            $result[] = "El campo dni es obligatorio";
        }
        $direccion = isset($datos['direccion']) ? $datos['direccion'] : null;
        if ( empty($direccion)) {
            $result[] = "El campo direccion es obligatorio";
        }

        $email = isset($datos['email']) ? $datos['email'] : null;
        if ( empty($email) ) {
            $result[] = "El campo email es obligatorio";
        }
        
        $telefono = isset($datos['telefono']) ? $datos['telefono'] : null;
        if ( empty($telefono) ) {
            $result[] = "El campo telefono es obligatorio";
        }
        $ciudad = isset($datos['ciudad']) ? $datos['ciudad'] : null;
        if ( empty($ciudad) ) {
            $result[] = "El campo ciudad es obligatorio";
        }
        $codigoPostal = isset($datos['codigoPostal']) ? $datos['codigoPostal'] : null;
        if ( empty($codigoPostal)) {
            $result[] = "El campo codigo Postal es obligatorio";
        }
        $tarjetaCredito = isset($datos['tarjetaCredito']) ? $datos['tarjetaCredito'] : null;
        if ( empty($tarjetaCredito) ) {
            $result[] = "El campo tarjeta de Crédito es obligatorio";
        }
        
        if (count($result) === 0) {
            $user = Usuario::crea($nombre, $nombreUsuario, $password,  $dni, $direccion, $email, $telefono, $ciudad, $codigoPostal, $tarjetaCredito);
            if ( ! $user ) {
                $result[] = "El usuario ya existe";
            } else {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $nombreUsuario;
                $result = 'index.php';
            }
        }
        return $result;
    }
}