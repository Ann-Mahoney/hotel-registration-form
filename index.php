<?php
require_once 'db.php';
require_once 'functions.php';
require_once 'delete.php';
require_once 'edit.php';
require_once 'process.php';

// Fetch all registrations
$registrations = $pdo->query('SELECT * FROM hotel ORDER BY id DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Registration</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .error { color: red; }
        .success { color: green; }
        form { max-width: 500px; margin-bottom: 30px; }
        label { display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; }
        table { border-collapse: collapse; width: 100%; margin-top: 30px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .actions a { margin-right: 8px; }
    </style>
</head>
<body>
    <?php include 'form.php'; ?>
    <h2>Registrations</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Room</th><th>Check-in</th><th>Check-out</th><th>Guests</th><th>Payment</th><th>Actions</th>
        </tr>
        <?php foreach ($registrations as $r): ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['name']) ?></td>
            <td><?= htmlspecialchars($r['email']) ?></td>
            <td><?= htmlspecialchars($r['phone']) ?></td>
            <td><?= htmlspecialchars($r['room_type']) ?></td>
            <td><?= htmlspecialchars($r['check_in']) ?></td>
            <td><?= htmlspecialchars($r['check_out']) ?></td>
            <td><?= htmlspecialchars($r['guests']) ?></td>
            <td><?= htmlspecialchars($r['payment_method']) ?></td>
            <td class="actions">
                <a href="?edit=<?= $r['id'] ?>">Edit</a>
                <a href="?delete=<?= $r['id'] ?>" onclick="return confirm('Delete this registration?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>