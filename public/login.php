<?php
session_start();
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/utils/Cors.php';

Cors::setHeaders();

$controller = new AuthController();
$controller->login();