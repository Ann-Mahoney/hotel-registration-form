<?php
require_once 'db.php';
if (!isset($fields)) {
    $fields = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'address' => '',
        'room_type' => '',
        'check_in' => '',
        'check_out' => '',
        'guests' => '',
        'special_requests' => '',
        'payment_method' => ''
    ];
}
if (!isset($edit)) $edit = false;
if (!isset($edit_id)) $edit_id = null;
if (isset($_GET['edit'])) {
    $edit = true;
    $edit_id = (int)$_GET['edit'];
    $stmt = $pdo->prepare('SELECT * FROM hotel WHERE id = ?');
    $stmt->execute([$edit_id]);
    $row = $stmt->fetch();
    if ($row) {
        foreach ($fields as $k => $v) {
            $fields[$k] = $row[$k];
        }
    }
} 