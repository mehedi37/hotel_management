<?php
session_start();
require_once __DIR__ . '/../app/controllers/AuthController.php';

$controller = new AuthController();
$controller->logout();