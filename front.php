<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Document</title>
    <link rel="stylesheet" href="front.css">
</head>

<body>
    <h1>TASK MANAGEMENT</h1>

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
                    <option value="On Going">On Going</option>
                    <option value="Need Checking">Need Checking</option>
                    <option value="Done">Done</option>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.modal').modal();
            $('select').formSelect();
            $('.datepicker').datepicker();
            $('.timepicker').timepicker();
        });
    </script>

</body>

</html>