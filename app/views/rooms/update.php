<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Update Room</h2>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="row justify-content-left">
    <div class="col-md-6">
        <form id="updateRoomForm" method="POST" action="/hotel_management/public/index.php?action=updateRoom">
            <div class="mb-3">
                <label for="updateRoomId" class="form-label">Room ID</label>
                <?php if (isset($roomData['id'])): ?>
                    <input type="number" class="form-control" id="updateRoomId" name="updateRoomId"
                        value="<?= $roomData['id']; ?>" readonly>
                <?php else: ?>
                    <div class="input-group">
                        <input type="number" class="form-control" id="updateRoomId" name="updateRoomId"
                            placeholder="Enter room ID" required>
                        <button type="button" class="btn btn-secondary" id="findRoom">
                        <i class="bi bi-search"></i>
                        Find Room</button>
                    </div>
                    <small class="form-text text-muted">Enter a room ID and click 'Find Room' to load its details</small>
                <?php endif; ?>
            </div>

            <div id="roomDetails" <?= !isset($roomData) ? 'style="display:none;"' : ''; ?>>
                <div class="mb-3">
                    <label for="updateRoomType" class="form-label">Room Type</label>
                    <input type="text" class="form-control" id="updateRoomType" name="updateRoomType"
                        value="<?= $roomData['type'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="updateRoomPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="updateRoomPrice" name="updateRoomPrice"
                        value="<?= $roomData['price'] ?? ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="updateRoomStatus" class="form-label">Status</label>
                    <select class="form-select" id="updateRoomStatus" name="updateRoomStatus" required>
                        <option value="Available" <?= ($roomData['status'] ?? '') == 'Available' ? 'selected' : ''; ?>>Available</option>
                        <option value="Occupied" <?= ($roomData['status'] ?? '') == 'Occupied' ? 'selected' : ''; ?>>Occupied</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="bi bi-floppy-fill"></i>
                Update Room</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('findRoom')?.addEventListener('click', function() {
    const roomId = document.getElementById('updateRoomId').value;
    if (roomId) {
        window.location.href = `/hotel_management/public/index.php?action=updateRoom&id=${roomId}`;
    }
});
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>