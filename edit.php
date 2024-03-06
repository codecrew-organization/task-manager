<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['task_id'])) {
        $task_id = $_POST['task_id'];
        
        $sql = "SELECT * FROM tblTask WHERE Id = $task_id";
        $result = $conn->query($sql);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo json_encode(array("error" => "Task not found"));
        }
    } else {
        echo json_encode(array("error" => "Task ID not provided"));
    }
} else {
    echo json_encode(array("error" => "Invalid request method"));
}
?>
