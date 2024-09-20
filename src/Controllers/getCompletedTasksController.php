<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class getCompletedTasksController
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
            return $this->renderer->render($response, 'completed.phtml', ['tasksData' => $this->model->completedTasks()]);
    }
}