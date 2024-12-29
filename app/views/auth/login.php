<?php
require_once __DIR__ . '/../../utils/SessionManager.php';
$session = SessionManager::getInstance();
$csrfToken = $session->regenerateToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Hotel Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hotel_management/public/css/style.css" rel="stylesheet">
</head>
<style>
  body{
    align-items: center;
  }
</style>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>
            <i class="bi bi-buildings-fill text-info"></i>
                Hotel Management</h2>
            <p class="text-muted">Admin Login</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/hotel_management/public/login.php" class="needs-validation" novalidate>
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="username" name="username"
                           placeholder="Enter your username" required autofocus>
                    <div class="invalid-feedback">Please enter your username.</div>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Enter your password" required>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login">
            <i class="bi bi-box-arrow-in-right"></i>
            Sign In</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
</body>
</html>