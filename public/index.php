<?php

//error_reporting(E_ALL);

use vendor\core\Router;

define('APP', dirname(__DIR__));
define('IMG_PREVIEW', dirname(__FILE__) . '/images/preview');
define('IMG', dirname(__FILE__) . '/images');
define('LAYOUT', 'default');
define('PAGINATION', 3);

$config = require_once '../config/app.php';

require $config['APP'] . '/vendor/autoload.php';


$query = rtrim($_SERVER['QUERY_STRING'], '/');

Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)/?(?P<param>[a-z-0-9]+)?$');
Router::add('^$', ['controller' => 'Main', 'action' => 'Index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
