<?php


require_once '../../baitap02/config/config.php';
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'quizzes';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Create the controller class name
$controllerClass = ucfirst($controller) . 'Controller';
// Instantiate the controller
$controllerFile = APP_ROOT . "/baitap02/controllers/$controllerClass.php";
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClassName = "\\controllers\\$controllerClass"; // Fully qualified class name
    $controllerInstance = new $controllerClassName(); // Instantiate the class

    $controllerInstance->$action();
}
?>