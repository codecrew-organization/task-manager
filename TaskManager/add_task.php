<?php
include 'config.php';

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];

// Insert task into database
$sql = "INSERT INTO tasks (title, description, status) VALUES ('$title', '$description', '$status')";
if ($conn->query($sql) === TRUE) {
    echo "Task added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
