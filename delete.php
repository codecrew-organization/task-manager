<?php
include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
    $taskId = $_POST['task_id'];

    $sql = "DELETE FROM tblTask WHERE Id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $taskId);

            if ($stmt->execute()) {
                echo "Task deleted successfully.";
            } else {
                echo "Error deleting task: " . $conn->error;
            }
            
        $stmt->close();
    } else {
        echo "Error preparing delete statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
