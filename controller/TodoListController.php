<?php

namespace controller;

use model\TasksModel;

class TodoListController
{

    public function actionIndex()
    {
        require dirname(__DIR__) . '/view/index.php';
    }

    private function cleanRequest($request)
    {
        return trim(preg_replace('/[^A-Za-z0-9\-][\S]/', '', $request));
    }

    public function actionSelectAllTasks()
    {
        $model = new TasksModel();
        $response = $model->selectAllTasks();

        echo json_encode($response);
        return true;
    }

    public function actionCreateTask()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') header('HTTP/1.0 404 Not Found');
        if (!isset($_POST['create-task'])) return false;

        $current_request = $this->cleanRequest($_POST['create-task']);

        $model = new TasksModel();
        $response['id'] = $model->createTask($current_request);

        echo json_encode($response);
        return true;
    }

    public function actionAddTask()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') header('HTTP/1.0 404 Not Found');
        if (!isset($_POST['add-task'])) return false;

        $current_request = $this->cleanRequest($_POST['add-task']);

        $model = new TasksModel();
        $tmp = $model->selectById($current_request);
        $response['id'] = $tmp['id'];
        $response['task_content'] = $tmp['task_content'];

        echo json_encode($response);
        return true;
    }

    public function actionDeleteTask()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') header('HTTP/1.0 404 Not Found');
        if (!isset($_POST['delete-task'])) return false;

        $current_request = $this->cleanRequest($_POST['delete-task']);

        $model = new TasksModel();
        $response['success'] = $model->deleteTask($current_request);

        echo json_encode($response);
        return true;
    }

    public function actionDeleteAllTasks()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') header('HTTP/1.0 404 Not Found');

        $model = new TasksModel();
        $response['success'] = $model->deleteAllTasks();

        echo json_encode($response);
        return true;
    }

}
