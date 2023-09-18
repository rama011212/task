<?php
require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $status_id = $_POST['status_id'];

    // Lakukan validasi data sesuai kebutuhan Anda

    // Lakukan pembaruan dalam database
    $updateQuery = "UPDATE tasks SET task_name = '$task_name', status_id = $status_id WHERE id = $task_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Tugas berhasil diperbarui.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Metode HTTP tidak valid.";
}

$conn->close();
?>