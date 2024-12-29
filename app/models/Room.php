<?php
require_once __DIR__ . '/../../config/dbconnect.php';

class Room {
    private $conn;
    private $table = 'rooms';

    public $id;
    public $type;
    public $price;
    public $status;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAllRooms() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addRoom() {
        $query = "INSERT INTO " . $this->table . " (type, price, status) VALUES (:type, :price, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':status', $this->status);
        return $stmt->execute();
    }

    public function updateRoom() {
        $query = "UPDATE " . $this->table . " SET type = :type, price = :price, status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':status', $this->status);
        return $stmt->execute();
    }

    public function deleteRoom() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}