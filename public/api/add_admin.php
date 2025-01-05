<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/dbconnect.php';
require_once __DIR__ . '/../../app/models/AdminUsers.php';
require_once __DIR__ . '/../../app/utils/Cors.php';

Cors::setHeaders();

// Secret key for API access
const API_SECRET = '007tOPVictoriasSecret';

function validateRequest() {
    if (!isset($_GET['secret']) || $_GET['secret'] !== API_SECRET) {
        return false;
    }
    if (!isset($_GET['username']) || !isset($_GET['password'])) {
        return false;
    }
    return true;
}

if (!validateRequest()) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}

try {
    $adminUser = new AdminUsers();

    $username = htmlspecialchars(trim($_GET['username']), ENT_QUOTES, 'UTF-8');
    $password = $_GET['password'];

    // Validate username
    if (empty($username) || strlen($username) < 3) {
        echo json_encode(['status' => 'error', 'message' => 'Username must be at least 3 characters long']);
        exit;
    }

    // Check if username already exists
    if ($adminUser->getUserByUsername($username)) {
        echo json_encode(['status' => 'error', 'message' => 'Username already exists']);
        exit;
    }

    // Create new admin user
    if ($adminUser->createUser($username, $password)) {
        echo json_encode(['status' => 'success', 'message' => 'Admin user created successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create admin user']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Server error']);
}