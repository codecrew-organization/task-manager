<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <!-- CSS styles -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Task Management</h1>
        <!-- Form to add a new task -->
        <form id="taskForm" class="task-form">
            <input type="text" id="taskTitle" class="task-input" placeholder="Enter task title" required>
            <textarea id="taskDescription" class="task-input" placeholder="Enter task description" required></textarea>
            <select id="taskStatus" class="task-input">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
            <input type="submit" value="Add Task" class="add-task-btn">
        </form>
        <!-- Display tasks -->
        <div id="taskList" class="task-list"></div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
</html>
