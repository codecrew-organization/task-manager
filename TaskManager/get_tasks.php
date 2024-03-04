<?php
include 'config.php';

// Fetch tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

// Output tasks
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="task">';
        echo '<h3 class="task-title">' . $row['title'] . '</h3>';
        echo '<p class="task-description">' . $row['description'] . '</p>';
        echo '<p>Status: ' . $row['status'] . '</p>';
        echo '<div class="task-buttons">';
        echo '<button class="editTask" data-id="' . $row['id'] . '">Edit</button>';
        echo '<button class="deleteTask" data-id="' . $row['id'] . '">Delete</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No tasks found.</p>';
}

$conn->close();
?>
