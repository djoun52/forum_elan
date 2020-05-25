<?php
    namespace App;

    require_once "app\Autoloader.php";
    Autoloader::register();

    use App\Router;

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS);
    define('PUBLIC_PATH', ROOT_DIR.'public'.DS);
    define('CSS_PATH', PUBLIC_PATH.'css'.DS);
    define('IMG_PATH', PUBLIC_PATH.'img'.DS);

    define('SERVICE_PATH', ROOT_DIR.'app'.DS);
    define('CTRL_PATH', ROOT_DIR.'controller'.DS);
    define('VIEW_PATH', ROOT_DIR.'view'.DS);

    $result = Router::handleRequest($_GET);

    require VIEW_PATH."layout.php";