<?php include __DIR__ . '/../layouts/header.php'; ?>

<h2>Dashboard</h2>
<table class="table table-bordered table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>Room ID</th>
            <th>Room Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="roomTable">
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $room['id']; ?></td>
                <td><?= $room['type']; ?></td>
                <td>&#2547; <?= $room['price']; ?></td>
                <td
                class="<?= $room['status'] === 'Available' ? 'text-success' : 'text-danger'; ?>"
                ><?= $room['status']; ?></td>
                <td>
                    <a href="/hotel_management/public/index.php?action=updateRoom&id=<?= $room['id']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form method="POST" action="/hotel_management/public/index.php?action=deleteRoom" style="display:inline;" onsubmit="return confirmDelete();">
                        <input type="hidden" name="deleteRoomId" value="<?= $room['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this room?');
}
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>