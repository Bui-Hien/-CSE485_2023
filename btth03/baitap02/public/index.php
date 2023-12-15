<?php
require_once '../../baitap02/config/config.php';
require_once '../../baitap02/config/Database.php';
require_once APP_ROOT . '/baitap02/controllers/QuizzesController.php';
$quizzesController = new \controllers\QuizzesController();
$quizzesController->index();