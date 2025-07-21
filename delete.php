<?php
require_once 'db.php';
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM hotel WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: index.php');
    exit;
} 