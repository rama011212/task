<?php
require 'db_connection.php'; // Koneksi ke database
?>

<h2>Daftar Tugas</h2>
<table border="1">
    <tr>
        <th>Nama Task</th>
        <th>Status</th>
        <th>User</th>
        <th>Aksi</th>
    </tr>
    <?php
    $taskQuery = "SELECT tasks.task_name, task_status.status_name, users.username, users.id AS user_id
                  FROM tasks
                  INNER JOIN task_status ON tasks.status_id = task_status.id
                  INNER JOIN users ON tasks.user_id = users.id";
    $taskResult = $conn->query($taskQuery);
    if ($taskResult->num_rows > 0) {
        while ($row = $taskResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['task_name'] . "</td>";
            echo "<td>" . $row['status_name'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
        ##    echo "<td><a href='update_task.php?task_id=" . $row['task_id'] . "'>Update</a></td>";

            // Check if "user_id" exists in the row before using it
            if (isset($row['user_id'])) {
                echo "<td><a href='add_task.php?user_id=" . $row['user_id'] . "'>" . $row['username'] . "</a></td>";
            } else {
                echo "<td>No User</td>";
            }
            
            echo "</tr>";
        }
    } else {
        echo "Tidak ada tugas yang ditemukan.";
    }
    $conn->close();
    ?>
</table>
