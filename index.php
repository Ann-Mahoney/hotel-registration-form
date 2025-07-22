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
        body { font-family: Arial, sans-serif; margin: 40px; background: #f8f9fa; }
        .form-container { background: #fff; padding: 24px 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); max-width: 520px; margin: 0 auto 30px auto; }
        .hotel-form label { display: block; margin-top: 14px; font-weight: 500; }
        .input-field { width: 100%; padding: 8px 10px; margin-top: 4px; border: 1px solid #ccc; border-radius: 4px; font-size: 1em; }
        .hotel-form textarea.input-field { min-height: 60px; }
        .submit-btn { background: #007bff; color: #fff; border: none; padding: 10px 22px; border-radius: 4px; font-size: 1em; margin-top: 16px; cursor: pointer; transition: background 0.2s; }
        .submit-btn:hover { background: #0056b3; }
        .full-width-btn { display: block; width: 100%; text-align: center; margin-top: 24px; }
        .error { color: #b30000; background: #ffeaea; border: 1px solid #ffb3b3; padding: 10px 16px; border-radius: 4px; margin-bottom: 10px; }
        .success { color: #155724; background: #d4edda; border: 1px solid #c3e6cb; padding: 10px 16px; border-radius: 4px; margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.04); margin-top: 30px; }
        th, td { border: 1px solid #e0e0e0; padding: 10px 8px; text-align: left; }
        th { background: #f0f0f0; font-weight: 600; }
        tr:nth-child(even) { background: #f9f9f9; }
        .actions a { margin-right: 8px; color: #007bff; text-decoration: none; }
        .actions a:hover { text-decoration: underline; }
        @media (max-width: 700px) {
            .form-container, table { max-width: 100%; margin: 0 0 30px 0; }
            body { margin: 10px; }
        }
    </style>
</head>
<body>
    <?php include 'form.php'; ?>
    <h2 style="margin-top:40px;">Registrations</h2>
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