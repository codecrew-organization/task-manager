$(document).ready(function() {
    // Load tasks on page load
    loadTasks();

    // Submit form to add new task
    $('#taskForm').submit(function(event) {
        event.preventDefault();
        var title = $('#taskTitle').val();
        var description = $('#taskDescription').val();
        var status = $('#taskStatus').val();
        addTask(title, description, status);
    });

    // Function to load tasks from the database
    function loadTasks() {
        $.ajax({
            url: 'get_tasks.php',
            type: 'GET',
            success: function(response) {
                $('#taskList').html(response);
            }
        });
    }

    // Function to add a new task to the database
    function addTask(title, description, status) {
        $.ajax({
            url: 'add_task.php',
            type: 'POST',
            data: {title: title, description: description, status: status},
            success: function(response) {
                $('#taskForm')[0].reset(); // Reset form fields
                loadTasks(); // Reload tasks
            }
        });
    }

    // Edit task
$(document).on('click', '.editTask', function() {
    var taskId = $(this).data('id');
    var newTitle = prompt('Enter new title:');
    if (newTitle !== null) {
        editTask(taskId, newTitle);
    }
});

// Function to edit a task
function editTask(taskId, newTitle) {
    $.ajax({
        url: 'edit_task.php',
        type: 'POST',
        data: {id: taskId, title: newTitle},
        success: function(response) {
            alert(response);
            loadTasks(); // Reload tasks
        }
    });
}

// Delete task
$(document).on('click', '.deleteTask', function() {
    var taskId = $(this).data('id');
    if (confirm('Are you sure you want to delete this task?')) {
        deleteTask(taskId);
    }
});

// Function to delete a task
function deleteTask(taskId) {
    $.ajax({
        url: 'delete_task.php',
        type: 'POST',
        data: {id: taskId},
        success: function(response) {
            alert(response);
            loadTasks(); // Reload tasks
        }
    });
}
});

