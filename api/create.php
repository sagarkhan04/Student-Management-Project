<?php
require dirname(__DIR__) . '/config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $status = $_POST['status'] ?? 'Active';

    // Validation
    if (empty($name) || empty($email) || empty($phone)) {
        $_SESSION['error'] = 'All fields are required.';
        header('Location: ../create.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid email address.';
        header('Location: ../create.php');
        exit;
    }

    // Prepare and execute query
    $sql = "INSERT INTO students (name, email, phone, status) VALUES (?, ?, ?, ?)";
    $stmt = $db_connect->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $status);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Student added successfully!';
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['error'] = 'Error adding student: ' . $db_connect->error;
        header('Location: ../create.php');
        exit;
    }
}
