<?php
require 'db_connection.php';

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    
    // Periksa apakah task_id valid sebelum melakukan pembaruan
    $taskQuery = "SELECT * FROM tasks WHERE id = $task_id";
    $taskResult = $conn->query($taskQuery);
    
    if ($taskResult->num_rows > 0) {
        // Tugas ditemukan, tampilkan formulir pembaruan
        $row = $taskResult->fetch_assoc();
        ?>
        <h2>Update Task</h2>
        <form action="process_update.php" method="POST">
            <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
            <label for="task_name">Nama Task:</label>
            <input type="text" name="task_name" value="<?php echo $row['task_name']; ?>">
            <label for="status_id">Status:</label>
            <select name="status_id">
                <!-- Isi dropdown dengan daftar status yang tersedia dari database -->
            </select>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "Tugas tidak ditemukan.";
    }
} else {
    echo "Parameter task_id tidak ditemukan.";
}

$conn->close();
?>
