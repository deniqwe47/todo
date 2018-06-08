<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <h1>Todo List</h1>
        <form id="todo-list">
            <div class="form-group">
                <label for="create-task">Enter task here</label>
                <input name="create-task" type="text" class="form-control" id="create-task"
                       placeholder="enter task here">
            </div>
            <div class="form-group">
                <label for="delete-task">Delete task</label>
                <input name="delete-task" type="number" class="form-control" id="delete-task"
                       placeholder="Enter task number to hide here">
            </div>
            <button type="submit" class="btn btn-default">Submit Query</button>
            <button id="remove-all-tasks" type="button" class="btn btn-danger">Remove All tasks</button>
        </form>
        <br/>
        <div id="result">
            <p>Here will be todo-list</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="components/todo-module.js"></script>
<script src="common.js"></script>
</body>
</html>
