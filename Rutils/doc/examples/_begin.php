<<<<<<< HEAD
<?php
namespace php_rutils\doc\examples;

define('LIB_DIR', realpath(__DIR__.'/../../..'));
define('CLI', php_sapi_name() == 'cli');
mb_internal_encoding('UTF-8');

if (CLI == false)
    header('Content-type: text/plain; charset=UTF-8');

spl_autoload_register(function($className) {
        $classPath = LIB_DIR. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';
        if (is_file($classPath))
            require_once $classPath;
        else
            throw new \Exception("Wrong class path $classPath");
    });

ob_start();
=======
<?php
namespace php_rutils\doc\examples;

define('LIB_DIR', realpath(__DIR__.'/../../..'));
define('CLI', php_sapi_name() == 'cli');
mb_internal_encoding('UTF-8');

if (CLI == false)
    header('Content-type: text/plain; charset=UTF-8');

spl_autoload_register(function($className) {
        $classPath = LIB_DIR. DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className).'.php';
        if (is_file($classPath))
            require_once $classPath;
        else
            throw new \Exception("Wrong class path $classPath");
    });

ob_start();
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
