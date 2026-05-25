<?php

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/TaskController.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';

$method = $_SERVER['REQUEST_METHOD'];

$path = $_GET['path'] ?? '';
if ($path === 'register' && $method === 'POST') {
    AuthController::register();
}

if ($path === 'login' && $method === 'POST') {
    AuthController::login();
}

if ($path === 'logout' && $method === 'POST') {
    AuthController::logout();
}

$userId = AuthMiddleware::handle();

if ($path === 'tasks' && $method === 'GET') {
    TaskController::index($userId);
}

if ($path === 'tasks' && $method === 'POST') {
    TaskController::create($userId);
}

if ($path === 'tasks' && $method === 'PUT') {
    TaskController::update($userId);
}

if ($path === 'tasks' && $method === 'DELETE') {
    TaskController::delete($userId);
}