<?php
require dirname(__DIR__) . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $status = $_POST['status'] ?? 'Active';

    // Validation
    if (empty($id) || empty($name) || empty($email) || empty($phone)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: ../index.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address.';
        header('Location: ../edit.php?id=' . $id);
        exit;
    }

    // Prepare and execute query
    $sql = "UPDATE students SET name = ?, email = ?, phone = ?, status = ? WHERE id = ?";
    $stmt = $db_connect->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $phone, $status, $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Student updated successfully!';
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Error updating student: ' . $db_connect->error;
        header('Location: ../edit.php?id=' . $id);
        exit;
    }
}
