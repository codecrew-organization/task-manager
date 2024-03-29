<?php
// Include the database configuration file
include_once("config.php");

// Check if data is received through POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare an INSERT statement
    $sql = "INSERT INTO tblTask (TaskName, TaskStatus, Priority, TaskDate, TaskTime) 
                VALUES (?, ?, ?, ?, ?)";

    // Initialize a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssss", $taskName, $status, $priority, $date, $time);

    // Retrieve data from POST request
    $taskName = $_POST['task_name'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];
    $time = $_POST['time'];

    echo $status . "<br>";
    echo $priority;
    // Execute the prepared statement
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
    
    // new comments