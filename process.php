<?php
require_once 'db.php';
require_once 'functions.php';
if (!isset($errors)) $errors = [];
if (!isset($success)) $success = '';
if (!isset($edit)) $edit = false;
if (!isset($edit_id)) $edit_id = null;
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($fields as $k => $v) {
        $fields[$k] = sanitize($_POST[$k] ?? '');
    }
    // Validation
    if (empty($fields['name'])) $errors[] = 'Name is required.';
    if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
    if (!preg_match('/^\+?[0-9\- ]{7,20}$/', $fields['phone'])) $errors[] = 'Valid phone is required.';
    if (empty($fields['address'])) $errors[] = 'Address is required.';
    if (empty($fields['room_type'])) $errors[] = 'Room type is required.';
    if (empty($fields['check_in']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fields['check_in'])) $errors[] = 'Valid check-in date is required.';
    if (empty($fields['check_out']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fields['check_out'])) $errors[] = 'Valid check-out date is required.';
    if (!is_numeric($fields['guests']) || $fields['guests'] < 1) $errors[] = 'Number of guests must be at least 1.';
    if (empty($fields['payment_method'])) $errors[] = 'Payment method is required.';
    // Check-in < Check-out
    if ($fields['check_in'] && $fields['check_out'] && $fields['check_in'] >= $fields['check_out']) {
        $errors[] = 'Check-out date must be after check-in date.';
    }
    if (count($errors) === 0) {
        if (isset($_POST['edit_id']) && $_POST['edit_id']) {
            // Update
            $stmt = $pdo->prepare('UPDATE hotel SET name=?, email=?, phone=?, address=?, room_type=?, check_in=?, check_out=?, guests=?, special_requests=?, payment_method=? WHERE id=?');
            $stmt->execute([
                $fields['name'], $fields['email'], $fields['phone'], $fields['address'], $fields['room_type'],
                $fields['check_in'], $fields['check_out'], $fields['guests'], $fields['special_requests'], $fields['payment_method'],
                (int)$_POST['edit_id']
            ]);
            $success = 'Registration updated successfully!';
            $edit = false;
            $edit_id = null;
            // Reset fields after success
            foreach ($fields as $k => $v) {
                $fields[$k] = '';
            }
        } else {
            // Insert
            $stmt = $pdo->prepare('INSERT INTO hotel (name, email, phone, address, room_type, check_in, check_out, guests, special_requests, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $fields['name'], $fields['email'], $fields['phone'], $fields['address'], $fields['room_type'],
                $fields['check_in'], $fields['check_out'], $fields['guests'], $fields['special_requests'], $fields['payment_method']
            ]);
            $success = 'Registration successful!';
            // Reset fields after success
            foreach ($fields as $k => $v) {
                $fields[$k] = '';
            }
        }
    } else {
        // If editing and validation fails, keep edit mode and id
        if (isset($_POST['edit_id']) && $_POST['edit_id']) {
            $edit = true;
            $edit_id = (int)$_POST['edit_id'];
        }
    }
} 