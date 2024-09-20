<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class getTasksController
{
private TasksModel $model;

private PhpRenderer $renderer;

public function __construct(TasksModel $model, PhpRenderer $renderer)
{
    $this->model = $model;
    $this->renderer = $renderer;
}

public function __invoke($request, $response, $args)
{
    if (isset($args['id']))
    {
        return $this->renderer->render($response, 'Task.phtml', ['tasksData' => $this->model->getTask($args['id'])]);
    }
    else
    {
        return $this->renderer->render($response, 'Tasks.phtml', ['tasksData' => $this->model->getTasks()]);
    }
}
}