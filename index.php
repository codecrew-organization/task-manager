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

    <table>
        <tr class="white-text">
            <th>Task Name</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Task 1</td>
            <td>Completed</td>
            <td>High</td>
            <td>2024-03-05</td>
            <td>10:00 AM</td>
            <td>
                <button class="editbtn white-text modal-trigger" href="#modal2">Edit</button>
                <button class="delbtn white-text modal-trigger" href="#modal3">Delete</button>
            </td>
        </tr>

    </table> <br><br>

    <div class="center-container">
        <a class="waves-effect btn-large btn modal-trigger" href="#modal1"><i class="material-icons left">add_circle_outline</i>ADD TASK</a>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Add Task</h4> <br>
            <div class="input-field col s6">
                <input placeholder="Task" id="task_name" type="text" class="validate">
            </div>
            <div class="input-field col s6">
                <select id="status">
                    <option value="" disabled selected>Status</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="input-field col s6">
                <input placeholder="Select Date" type="text" class="datepicker">
            </div>
            <div class="input-field col s6">
                <select id="priority">
                    <option value="" disabled selected>Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="input-field col s6">
                <input placeholder="Select Time" type="text" class="timepicker">
            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Save</a>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h4>Edit Task</h4> <br>
            <div class="input-field col s6">
                <input placeholder="Task" id="task_name" type="text" class="validate">
            </div>
            <div class="input-field col s6">
                <select id="status">
                    <option value="" disabled selected>Status</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="input-field col s6">
                <input placeholder="Select Date" type="text" class="datepicker">
            </div>
            <div class="input-field col s6">
                <select id="priority">
                    <option value="" disabled selected>Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="input-field col s6">
                <input placeholder="Select Time" type="text" class="timepicker">
            </div>
        </div>

        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Save</a>
        </div>
    </div>



    <div id="modal3" class="modal">
    <div class="modal-content">
        <h4>Are you sure you want to delete the task?</h4>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Yes</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
<script>
    $(document).ready(function(){
        $('.modal').modal();
        $('select').formSelect();
        $('.datepicker').datepicker();
        $('.timepicker').timepicker();
    });
</script>
</body>

</html>
