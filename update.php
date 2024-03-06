<?php
    include_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['edit_task_id']) && isset($_POST['edit_task_name']) && isset($_POST['edit_status']) && isset($_POST['edit_date']) && isset($_POST['edit_priority']) && isset($_POST['edit_time'])) {
            $edit_task_id = $_POST['edit_task_id'];
            $edit_task_name = $_POST['edit_task_name'];
            $edit_status = $_POST['edit_status'];
            $edit_date = $_POST['edit_date'];
            $edit_priority = $_POST['edit_priority'];
            $edit_time = $_POST['edit_time'];

            $sql = "UPDATE tblTask SET TaskName = '$edit_task_name', TaskStatus = '$edit_status', TaskDate = '$edit_date', Priority = '$edit_priority', TaskTime = '$edit_time' WHERE Id = $edit_task_id";
            
            if ($conn->query($sql) === TRUE) {
                echo "Task updated successfully";
            } else {
                echo "Error updating task: " . $conn->error;
            }
        } else {
            echo "Incomplete data provided";
        }
    } else {
        echo "Invalid request method";
    }
?>
