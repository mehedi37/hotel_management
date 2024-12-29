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
        <title>Hotel Management</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/hotel_management/public/css/style.css" rel="stylesheet">
    </head>
<body>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/hotel_management/public/index.php">Hotel Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/hotel_management/public/index.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hotel_management/public/index.php?action=addRoom">Add Room</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hotel_management/public/index.php?action=updateRoom">Update Room</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hotel_management/public/index.php?action=deleteRoom">Delete Room</a></li>
                </ul>
                <div class="navbar-nav">
                    <span class="nav-item nav-link">
                        <i class="bi bi-person-circle"></i>
                        <?php echo $_SESSION['username']; ?>
                    </span>
                    <a href="/hotel_management/public/index.php?action=logout" class="nav-link text-danger">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">