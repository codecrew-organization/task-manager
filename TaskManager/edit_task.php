<?php
include 'config.php';

// Get form data
$taskId = $_POST['id'];
$newTitle = $_POST['title'];

// Update task in database
$sql = "UPDATE tasks SET title='$newTitle' WHERE id='$taskId'";
if ($conn->query($sql) === TRUE) {
    echo "Task updated successfully!";
} else {
    echo "Error updating task: " . $conn->error;
}

$conn->close();
?>
