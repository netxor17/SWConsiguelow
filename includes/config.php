<?php
namespace es\fdi\ucm\aw;
// Varios defines para los parámetros de configuración de acceso a la BD y la URL desde la que se sirve la aplicación
define('BD_HOST', 'localhost');
define('BD_NAME', 'consiguelowdb');
define('BD_USER', 'consiguelowdb');
define('BD_PASS', 'consiguelowdb');
define('RAIZ_APP', __DIR__);
define('RUTA_APP', '/SWConsiguelow/');
define('RUTA_IMGS', RUTA_APP.'img/');
define('RUTA_CSS', RUTA_APP.'styles/');
//define('RUTA_JS', RUTA_APP.'js/');
define('INSTALADA', true );

if (! INSTALADA) {
    echo "La aplicación no está configurada";
    exit();
  }


/**
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'es\\fdi\\ucm\\aw';
    // base directory for the namespace prefix
    $base_dir = __DIR__;
    /*echo "class: ";
    echo $class . "\n";*/
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});




/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

// Inicializa la aplicación
$app = Aplicacion::getSingleton();
$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS), RUTA_APP, RAIZ_APP);

/**
 * @see http://php.net/manual/en/function.register-shutdown-function.php
 * @see http://php.net/manual/en/language.types.callable.php
 */
register_shutdown_function(array($app, 'shutdown'));