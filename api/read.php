<?php
require dirname(__DIR__) . '/config/db.php';

function getAllStudents()
{
    global $db_connect;

    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = $db_connect->query($sql);

    $students = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    return $students;
}

function getStudentById($id)
{
    global $db_connect;

    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $db_connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

function searchStudents($searchTerm = '', $status = '')
{
    global $db_connect;

    $students = [];
    $sql = "SELECT * FROM students WHERE 1=1";
    $types = "";
    $params = [];

    // Add search term filter (searches in name, email, and phone)
    if (!empty($searchTerm)) {
        $sql .= " AND (name LIKE ? OR email LIKE ? OR phone LIKE ?)";
        $searchWildcard = "%{$searchTerm}%";
        $types .= "sss";
        $params = array_merge($params, [$searchWildcard, $searchWildcard, $searchWildcard]);
    }

    // Add status filter
    if (!empty($status)) {
        $sql .= " AND status = ?";
        $types .= "s";
        $params[] = $status;
    }

    $sql .= " ORDER BY id DESC";

    $stmt = $db_connect->prepare($sql);
    
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    return $students;
}
