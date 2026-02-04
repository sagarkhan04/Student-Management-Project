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
