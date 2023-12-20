<?php
require_once '../../baitap02/config/config.php';

// giả sử tất cả các URL có dạng http://localhost/public/index.php?controller=quizzes&action=index

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'quizzes';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Create the controller class name
$controllerClass = ucfirst($controller) . 'Controller';
echo $controllerClass;
// Instantiate the controller
$controllerFile = APP_ROOT . "/baitap02/controllers/$controllerClass.php";
echo "<br/>";
echo $controllerFile;
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClassName = "\\controllers\\$controllerClass"; // Fully qualified class name
    $controllerInstance = new $controllerClassName(); // Instantiate the class

    $controllerInstance->$action();
} else {
    echo "Khong tim thay page";
}
?>