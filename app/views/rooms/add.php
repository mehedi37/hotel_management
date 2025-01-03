<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-left">
    <div class="col-md-6">
        <h2 class="mb-4">Add Room</h2>
        <form id="addRoomForm" method="POST" action="/hotel_management/public/index.php?action=addRoom">
            <div class="mb-3">
                <label for="roomType" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="roomType" name="roomType" placeholder="Enter room type" required>
            </div>
            <div class="mb-3">
                <label for="roomPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="roomPrice" name="roomPrice" placeholder="Enter room price" required>
            </div>
            <div class="mb-3">
                <label for="roomStatus" class="form-label">Status</label>
                <select class="form-select" id="roomStatus" name="roomStatus">
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-house-add-fill"></i>&nbsp;
                Add Room
            </button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>