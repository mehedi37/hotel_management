<?php
session_start();
require_once __DIR__ . '/../app/controllers/DashboardController.php';
require_once __DIR__ . '/../app/controllers/RoomController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/utils/Cors.php';

Cors::setHeaders();

$session = SessionManager::getInstance();
if (!$session->get('user_id')) {
    header('Location: /hotel_management/public/login.php');
    exit;
}

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}

$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
    case 'addRoom':
        $controller = new RoomController();
        $controller->addRoom();
        break;
    case 'updateRoom':
        $controller = new RoomController();
        $controller->updateRoom();
        break;
    case 'deleteRoom':
        $controller = new RoomController();
        $controller->deleteRoom();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        $controller = new DashboardController();
        $controller->index();
        break;
}