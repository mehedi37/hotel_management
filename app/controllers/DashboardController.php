<?php
require_once __DIR__ . '/../models/Room.php';

class DashboardController {
    public function index() {
        $room = new Room();
        $rooms = $room->getAllRooms();
        include __DIR__ . '/../views/rooms/dashboard.php';
    }
}