<?php
require_once __DIR__ . '/../models/Room.php';

class RoomController {
    public function addRoom() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = new Room();
            $room->type = $_POST['roomType'];
            $room->price = $_POST['roomPrice'];
            $room->status = $_POST['roomStatus'];
            $room->addRoom();
            header('Location: /hotel_management/public/index.php');
        } else {
            include __DIR__ . '/../views/rooms/add.php';
        }
    }

    public function updateRoom() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = new Room();
            $room->id = $_POST['updateRoomId'];

            // First check if the room exists
            $existingRoom = $room->getRoomById($room->id);
            if (!$existingRoom) {
                $_SESSION['error'] = "Room with ID {$room->id} not found.";
                header('Location: /hotel_management/public/index.php?action=updateRoom');
                exit;
            }

            $room->type = $_POST['updateRoomType'];
            $room->price = $_POST['updateRoomPrice'];
            $room->status = $_POST['updateRoomStatus'];
            $room->updateRoom();
            header('Location: /hotel_management/public/index.php');
        } else {
            $roomData = null;
            if (isset($_GET['id'])) {
                $room = new Room();
                $roomData = $room->getRoomById($_GET['id']);
                if (!$roomData) {
                    $_SESSION['error'] = "Room not found.";
                }
            }
            include __DIR__ . '/../views/rooms/update.php';
        }
    }

    public function deleteRoom() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room = new Room();
            $room->id = $_POST['deleteRoomId'];
            $room->deleteRoom();
            header('Location: /hotel_management/public/index.php');
        } else {
            include __DIR__ . '/../views/rooms/delete.php';
        }
    }

    private function validateRoomInput($type, $price) {
    if (empty($type)) {
        $_SESSION['error'] = "Room type cannot be empty";
        return false;
    }
    if (!is_numeric($price) || $price <= 0) {
        $_SESSION['error'] = "Price must be a positive number";
        return false;
    }
    return true;
}
}