<?php
namespace es\fdi\ucm\aw;
//require_once __DIR__.'/Form.php';
//require_once __DIR__.'/Usuario.php';

class FormularioLogin extends Form
{
    public function __construct() {
        parent::__construct('formLogin');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        if ($datos) {
            $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : $nombreUsuario;
        }
        $html = <<<EOF
        <fieldset>
            <legend>Usuario y contraseña</legend>
            <p><label>Nombre de usuario:</label> <input type="text" name="nombreUsuario" value="$nombreUsuario"/></p>
            <p><label>Password:</label> <input type="password" name="password" /></p>
            <button type="submit" name="login">Entrar</button>
        </fieldset>
EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['nombreUsuario']) ? $datos['nombreUsuario'] : null;
                
        if ( empty($nombreUsuario) ) {
            $result[] = "El nombre de usuario no puede estar vacío";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        
        if ( empty($password) ) {
            $result[] = "El password no puede estar vacío.";
        }
        
        if (count($result) === 0) {

            $usuario = Usuario::login($nombreUsuario, $password);
            if ( ! $usuario ) {
                // No se da pistas a un posible atacante
                $result[] = "El usuario o el password no coinciden";
            } else {
                 // SEGURIDAD: Forzamos que se genere una nueva cookie de sesión por si la han capturado antes de hacer login
                session_regenerate_id(true);
                Aplicacion::getSingleton()->login($usuario);
                $result = 'index.php';
            }
        }
        return $result;
    }
}