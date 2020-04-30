<?php
namespace es\fdi\ucm\aw;
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


//require_once __DIR__.'/Aplicacion.php';

/**
 * Parámetros de conexión a la BD
 */

define('BD_HOST', 'localhost');
define('BD_NAME', 'consiguelowdb');
define('BD_USER', 'consiguelowdb');
define('BD_PASS', 'consiguelowdb');

/*Database de Nestor
define('BD_HOST', 'localhost');
define('BD_NAME', 'tiendaonline');
define('BD_USER', 'root');
define('BD_PASS', '');
/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

// Inicializa la aplicación
$app = Aplicacion::getSingleton();
$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

/**
 * @see http://php.net/manual/en/function.register-shutdown-function.php
 * @see http://php.net/manual/en/language.types.callable.php
 */
register_shutdown_function(array($app, 'shutdown'));