<?php
require_once __DIR__ . '/../models/AdminUsers.php';
require_once __DIR__ . '/../utils/SessionManager.php';
require_once __DIR__ . '/../utils/Logger.php';

class AuthController {
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $session = SessionManager::getInstance();

            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $session->get('csrf_token')) {
                $_SESSION['error'] = 'Invalid request';
                Logger::log('Invalid CSRF token attempt', 'WARNING');
                header('Location: /hotel_management/public/login.php');
                exit;
            }

            $username = htmlspecialchars(trim($_POST['username'] ?? ''), ENT_QUOTES, 'UTF-8');
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $_SESSION['error'] = 'Username and password are required';
                header('Location: /hotel_management/public/login.php');
                exit;
            }

            $adminUser = new AdminUsers();
            $user = $adminUser->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $session->set('user_id', $user['id']);
                $session->set('username', $user['username']);
                Logger::log("User {$username} logged in successfully", 'INFO');
                header('Location: /hotel_management/public/index.php');
            } else {
                $_SESSION['error'] = 'Invalid username or password';
                Logger::log("Failed login attempt for username: {$username}", 'WARNING');
                header('Location: /hotel_management/public/login.php');
            }
        } else {
            include __DIR__ . '/../views/auth/login.php';
        }
    }

    public function logout() {
        $session = SessionManager::getInstance();
        Logger::log("User {$session->get('username')} logged out", 'INFO');
        $session->remove('user_id');
        $session->remove('username');
        session_destroy();
        header('Location: /hotel_management/public/login.php');
        exit;
    }
}