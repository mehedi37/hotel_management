<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Delete Room</h2>
<form id="deleteRoomForm" method="POST" action="/hotel_management/public/index.php?action=deleteRoom">
    <div class="mb-3">
        <label for="deleteRoomId" class="form-label">Room ID</label>
        <input type="text" class="form-control" id="deleteRoomId" name="deleteRoomId" placeholder="Enter room ID to delete" required>
    </div>
    <button type="submit" class="btn btn-danger">
    <i class="bi bi-trash3-fill"></i>
    Delete Room</button>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>