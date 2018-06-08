let TodoModule = (function () {

    let result = $('#result'),
        ul = document.createElement('ul'),
        todoForm = $('#todo-list');

    function selectAllTasks() {
        $.ajax({
            url: 'todo-list/select-all-tasks',
            dataType: 'json',
            method: 'post',
            success: (response) => {
                response.map(value => {
                    let li = document.createElement('li');
                    li.append('Your ' + value.id + ' task is: ' + value.task_content);
                    $(li).attr('id', value.id);
                    ul.append(li);
                });
                result.html(ul);
            }
        });
    }

    function createTask(content) {
        $.ajax({
            url: 'todo-list/create-task',
            dataType: 'json',
            method: 'post',
            data: {
                'create-task': content
            },
            success: (response) => {
                addTaskToList(response.id);
            }
        });
    }

    function addTaskToList(id) {
        $.ajax({
            url: 'todo-list/add-task',
            dataType: 'json',
            method: 'post',
            data: {
                'add-task': id
            },
            success: (response) => {
                let li = document.createElement('li');
                li.append('Your ' + response.id + ' task is: ' + response.task_content);
                $(li).attr('id', response.id);
                ul.append(li);
                result.append(ul);
            }
        });
    }

    function deleteTask(id) {
        $.ajax({
            url: 'todo-list/delete-task',
            dataType: 'json',
            method: 'post',
            data: {
                'delete-task': id
            },
            success: (response) => {
                if (response.success) {
                    $('#' + id).remove();
                }
            }
        });
    }

    function deleteAllTasks() {
        console.log('deleteAll');
        $.ajax({
            url: 'todo-list/delete-all-tasks',
            dataType: 'json',
            method: 'post',
            success: (response) => {
                if (response.success) {
                    ul = document.createElement('ul');
                    $(result).html('<p>Here will be todo-list</p>');
                }
            }
        });
    }

    function init(str) {

        let tempArr = str.split('&');

        let createContent = tempArr[0].substr((tempArr[0].indexOf('=') + 1));
        let deleteId = tempArr[1].split('=')[1];

        if (createContent.length == 0 && deleteId.length == 0) alert('Try to type something!');
        if (createContent.length != 0) createTask(createContent);
        if (deleteId.length != 0) deleteTask(deleteId);
    }

    return {
        init: init,
        selectAllTasks: selectAllTasks,
        deleteAllTasks: deleteAllTasks
    };

}());
