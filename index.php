<?php
    include_once("config.php");

    // Fetch tasks from the database
    $sql = "SELECT * FROM tblTask";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Task Management</title>
</head>

<body>
    <table id="taskTable">
        <thead>
            <tr class="white-text">
                <th>Task Name</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Display tasks in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['TaskName']}</td>";
                    echo "<td>{$row['TaskStatus']}</td>";
                    echo "<td>{$row['Priority']}</td>";
                    echo "<td>{$row['TaskDate']}</td>";
                    echo "<td>{$row['TaskTime']}</td>";
                    echo "<td>";
                    echo "<button class='editbtn white-text modal-trigger' data-id='{$row['Id']}' data-target='modal2'>Edit</button>";
                    echo "<button class='delbtn white-text' data-id='{$row['Id']}'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No tasks found</td></tr>";
            }
            ?>
        </tbody>
    </table> <br><br>

    <div class="center-container">
        <a class="waves-effect btn-large btn modal-trigger" href="#modal1"><i class="material-icons left">add_circle_outline</i>ADD TASK</a>
    </div>

    <!-- ADD TASK -->
    <div id="modal1" class="modal">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="modal-content">
                <h4>Add Task</h4> <br>
                <div class="input-field col s6">
                    <input placeholder="Task" id="task_name" type="text" name="task_name" class="validate">
                </div>
                <div class="input-field col s6">
                    <select id="status" name="status">
                        <option value="" disabled selected>Status</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Select Date" type="date" id="date" class="datepicker" name="date">
                </div>
                <div class="input-field col s6">
                    <select id="priority" name="priority">
                        <option value="" disabled selected>Priority</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Select Time" type="text" id="time" class="timepicker" name="time">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="modal-close waves-effect waves-green btn-flat">Save</button>
            </div>
        </form>
    </div>

    <!-- EDIT TASK -->
<div id="modal2" class="modal">
    <form id="editTaskForm" method="post">
        <div class="modal-content">
            <h4>Edit Task</h4>
            <input type="hidden" id="edit_task_id" name="edit_task_id">
            <div class="input-field">
                <input placeholder="Task" id="edit_task_name" type="text" class="validate" name="edit_task_name">
            </div>
            <div class="input-field">
                <select id="edit_status" name="edit_status">
                    <option value="" disabled selected>Status</option>
                    <option value="checking">Need Checking</option>
                    <option value="ongoing">On-Going</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="input-field">
                <input placeholder="Select Date" type="text" class="datepicker" id="edit_date" name="edit_date">
            </div>
            <div class="input-field">
                <select id="edit_priority" name="edit_priority">
                    <option value="" disabled selected>Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="input-field">
                <input placeholder="Select Time" type="text" class="timepicker" id="edit_time" name="edit_time">
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Save</button>
        </div>
    </form>
</div>


    <!-- DELETE TASK -->
    <div id="modal3" class="modal">
        <div class="modal-content">
            <h4>Are you sure you want to delete the task?</h4>
        </div>
        <div class="modal-footer">
            <input type="hidden" id="delete_task_id">
            <a href="#!" id="confirm_delete" class="modal-close waves-effect waves-green btn-flat">Yes</a>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
        </div>
    </div>


    <!-- Include jQuery and Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Initialize Materialize components -->
    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('select').formSelect();
            $('.timepicker').timepicker();

            // Add Task
            $('#btn-flat').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#taskTable tbody').append(response);
                        $('#modal1').modal('close');
                    }
                });
            });

            // Get Row to Edit Task
            $('.editbtn').click(function() {
                var taskId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: 'edit.php',
                    data: { task_id: taskId },
                    success: function(response) {
                        var task = JSON.parse(response);
                        $('#edit_task_id').val(task.Id);
                        $('#edit_task_name').val(task.TaskName);
                        $('#edit_status').val(task.TaskStatus);
                        $('#edit_date').val(task.TaskDate);
                        $('#edit_priority').val(task.Priority);
                        $('#edit_time').val(task.TaskTime);
                        $('#modal2').modal('open');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error fetching task details. Please try again.');
                    }
                });
            });

            // Update Task
            $('#editTaskForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'update.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload(); 
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error updating task. Please try again.');
                    }
                });
            });


            // Delete Task
            $('.delbtn').click(function() {
                var taskId = $(this).data('id');
                $('#delete_task_id').val(taskId);
                $('#modal3').modal('open');
            });

            $('#confirm_delete').click(function() {
                var taskId = $('#delete_task_id').val();
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {
                        task_id: taskId
                    },
                    success: function(response) {
                        alert(response); // Show success/error message
                        location.reload(); // Reload the page after deletion
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error deleting task. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>
