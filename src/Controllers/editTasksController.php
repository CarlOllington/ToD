<?php

namespace App\Controllers;

use App\Models\TasksModel;
use Slim\Views\PhpRenderer;

class editTasksController
{
    private TasksModel $model;
    private PhpRenderer $renderer;


    public function __construct(TasksModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response)
    {
        $task = $request->getParsedBody();
        $id = array_key_first($task);
        $edit = $task[$id];
        return $this->renderer->render($response->withHeader('Location', '/tasks')->withStatus(301), 'tasks.phtml', ['task' => $this->model->editTask($id,$edit)]);
    }
}