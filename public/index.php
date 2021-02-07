<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Controllers\UserController;
use App\Core\Application;

function redirect($path){
    return header("Location: $path");
}

session_start();

$app = new Application(dirname(__DIR__));

$app->router->get('/', [UserController::class, 'index']);
$app->router->get('/users', [UserController::class, 'create']);
$app->router->post('/users', [UserController::class, 'store']);

$app->run();
