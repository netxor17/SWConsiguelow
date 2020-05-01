<?php
namespace es\fdi\ucm\aw;
/**
 * Clase que mantiene el estado global de la aplicación.
 */
class Aplicacion
{
	private static $instancia;

	private $dirInstalacion;

	
	/**
	 * Permite obtener una instancia de <code>Aplicacion</code>.
	 * 
	 * @return Applicacion Obtiene la única instancia de la <code>Aplicacion</code>
	 */
	public static function getSingleton() {
		if (  !self::$instancia instanceof self) {
			self::$instancia = new self;
		}
		return self::$instancia;
	}

	/**
	 * @var array Almacena los datos de configuración de la BD
	 */
	private $bdDatosConexion;
	
	/**
	 * Almacena si la Aplicacion ya ha sido inicializada.
	 * 
	 * @var boolean
	 */
	private $inicializada = false;
	
	/**
	 * @var \mysqli Conexión de BD.
	 */
	private $conn;
	
	/**
	 * Evita que se pueda instanciar la clase directamente.
	 */
	private function __construct() {
	}
	
	/**
	 * Evita que se pueda utilizar el operador clone.
	 */
	private function __clone()
	{
	    parent::__clone();
	}
	
	/**
	 * Evita que se pueda utilizar unserialize().
	 */
	private function __wakeup()
	{
	    return parent::__wakeup();
	}
	
	/**
	 * Inicializa la aplicación.
	 * 
	 * @param array $bdDatosConexion datos de configuración de la BD
	 */
	public function init($bdDatosConexion, $rutaRaizApp, $dirInstalacion)
	{
	  $this->bdDatosConexion = $bdDatosConexion;
  
	  $this->rutaRaizApp = $rutaRaizApp;
	  $tamRutaRaizApp = mb_strlen($this->rutaRaizApp);
	  if ($tamRutaRaizApp > 0 && $this->rutaRaizApp[$tamRutaRaizApp-1] !== '/') {
		$this->rutaRaizApp .= '/';
	  }
  
	  $this->dirInstalacion = $dirInstalacion;
	  $tamDirInstalacion = mb_strlen($this->dirInstalacion);
	  if ($tamDirInstalacion > 0 && $this->dirInstalacion[$tamDirInstalacion-1] !== '/') {
		$this->dirInstalacion .= '/';
	  }
  
	  $this->conn = null;
	  session_start();
	}

	public function resuelve($path = '')
	{
	  $rutaRaizAppLongitudPrefijo = mb_strlen($this->rutaRaizApp);
	  if( mb_substr($path, 0, $rutaRaizAppLongitudPrefijo) === $this->rutaRaizApp ) {
		return $path;
	  }
  
	  if (mb_strlen($path) > 0 && $path[0] == '/') {
		$path = mb_substr($path, 1);
	  }
	  return $this->rutaRaizApp . $path;
	}
  
	
	/**
	 * Cierre de la aplicación.
	 */
	public function shutdown()
	{
	    $this->compruebaInstanciaInicializada();
	    if ($this->conn !== null) {
	        $this->conn->close();
	    }
	}
	
	/**
	 * Comprueba si la aplicación está inicializada. Si no lo está muestra un mensaje y termina la ejecución.
	 */
	private function compruebaInstanciaInicializada()
	{
	    if (! $this->inicializada ) {
	        echo "Aplicacion no inicializa";
	        exit();
	    }
	}
	
	/**
	 * Devuelve una conexión a la BD. Se encarga de que exista como mucho una conexión a la BD por petición.
	 * 
	 * @return \mysqli Conexión a MySQL.
	 */
	public function conexionBd()
	{
	    $this->compruebaInstanciaInicializada();
		if (! $this->conn ) {
			$bdHost = $this->bdDatosConexion['host'];
			$bdUser = $this->bdDatosConexion['user'];
			$bdPass = $this->bdDatosConexion['pass'];
			$bd = $this->bdDatosConexion['bd'];
			
			$this->conn = new \mysqli($bdHost, $bdUser, $bdPass, $bd);
			if ( $this->conn->connect_errno ) {
				echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
				exit();
			}
			if ( ! $this->conn->set_charset("utf8mb4")) {
				echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
				exit();
			}
		}
		return $this->conn;
	}


	public function doInclude($path = '')
	{
	  $params = array();
	  $this->doIncludeInterna($path, $params);
	}
	
	private function doIncludeInterna($path, &$params)
	{  
	  if (mb_strlen($path) > 0 && $path[0] == '/') {
		$path = mb_substr($path, 1);
	  }
	  include($this->dirInstalacion . '/'.$path);
	}
	
	public function generaVista(string $rutaVista, array &$params)
	{
	  $params['app'] = $this;
	  $this->doIncludeInterna($rutaVista, $params);
	}

	public function login(Usuario $user)
	{
	  $_SESSION['login'] = true;
	  $_SESSION['username'] = $user->username();
	  $_SESSION['idUser'] = $user->id;
	}
  
	public function logout()
	{
	  //Doble seguridad: unset + destroy
	  unset($_SESSION['login']);
	  unset($_SESSION['username']);
	  unset($_SESSION['idUser']);
  
	  session_destroy();
	  session_start();
	}

	public function usuarioLogueado()
	{
	  return ($_SESSION['login'] ?? false) === true;
	}
  
	public function nombreUsuario()
	{
	  return $_SESSION['nombre'] ?? '';
	}

	public function tieneRol($rol, $cabeceraError=NULL, $mensajeError=NULL)
	{
	  $roles = $_SESSION['roles'] ?? array();
	  if (! in_array($rol, $roles)) {
		if ( !is_null($cabeceraError) && ! is_null($mensajeError) ) {
		  $bloqueContenido=<<<EOF
  <h1>$cabeceraError!</h1>
  <p>$mensajeError.</p>
  EOF;
		  echo $bloqueContenido;
		}
  
		return false;
	  }
  
	  return true;
	}
}