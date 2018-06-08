<?php
require 'config/autoloader.php';

$autoloader = new Autoloader();
$autoloader->init();

use config\Router;
use controller\TodoListController;

//new TodoListController();

$route = new Router();

Router::add('', ['controller' => 'TodoList', 'action' => 'Index']);
Router::add('todo-list/select-all-tasks', ['controller' => 'TodoList', 'action' => 'selectAllTasks']);
Router::add('todo-list/create-task', ['controller' => 'TodoList', 'action' => 'CreateTask']);
Router::add('todo-list/add-task', ['controller' => 'TodoList', 'action' => 'AddTask']);
Router::add('todo-list/delete-task', ['controller' => 'TodoList', 'action' => 'DeleteTask']);
Router::add('todo-list/delete-all-tasks', ['controller' => 'TodoList', 'action' => 'DeleteAllTasks']);

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$query = trim($request_uri[0], '/');

Router::dispatch($query);