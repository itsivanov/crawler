<?php
define('PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);

/**
 * Automatically connects
 *
 * @return void
 **/
function autoloader($name) {
    include_once PATH_ROOT . DS .  'objects' . DS . $name . '.php';
}
