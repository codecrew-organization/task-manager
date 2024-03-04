<?php
include 'config.php';

// Get form data
$taskId = $_POST['id'];

// Delete task from database
$sql = "DELETE FROM tasks WHERE id='$taskId'";
if ($conn->query($sql) === TRUE) {
    echo "Task deleted successfully!";
} else {
    echo "Error deleting task: " . $conn->error;
}

$conn->close();
?>
