<?php
require_once __DIR__ . '/../../config/dbconnect.php';

class AdminUsers {
    private $conn;
    private string $table = 'adminusers';

    public function __construct() {
        $database = new Database();
        try {
            $this->conn = $database->connect();
        } catch (Exception $e) {
            
        }
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password) {
        // Check if username already exists
        if ($this->getUserByUsername($username)) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO " . $this->table . " (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }
}