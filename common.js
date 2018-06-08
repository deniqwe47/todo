$(document).ready(function(){
    TodoModule.selectAllTasks();
});

$('body').on('submit', '#todo-list', function (event) {
    event.preventDefault();
    TodoModule.init($(event.target).serialize());
});

$('body').on('click', '#remove-all-tasks', function () {
    TodoModule.deleteAllTasks();
});
