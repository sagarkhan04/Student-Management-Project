<?php
require dirname(__DIR__) . '/config/db.php';

$id = $_GET['id'] ?? '';

if (empty($id)) {
    $_SESSION['error'] = 'Student ID is required.';
    header('Location: ../index.php');
    exit;
}

// Prepare and execute delete query
$sql = "DELETE FROM students WHERE id = ?";
$stmt = $db_connect->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $_SESSION['success'] = 'Student deleted successfully!';
    header('Location: ../index.php');
    exit;
} else {
    $_SESSION['error'] = 'Error deleting student: ' . $db_connect->error;
    header('Location: ../index.php');
    exit;
}
