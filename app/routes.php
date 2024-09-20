<?php
declare(strict_types=1);

use App\Controllers\completeTasksController as completeTasksController;
use App\Controllers\deleteTasksController as deleteTasksController;
use App\Controllers\editTasksController as editTasksController;
use App\Controllers\getCompletedTasksController as getCompletedTasksController;
use App\Controllers\getTasksController as getTasksController;
use App\Controllers\postTasksController as postTasksController;
use Slim\App;
use Slim\Views\PhpRenderer;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller

    $app->get('/', function ($request, $response, $args) use ($container) {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "index.php", $args);
    });


    $app->get('/tasks[/{id}]', getTasksController::class);

    $app->post('/tasks', postTasksController::class);

    $app->post('/tasks/complete', completeTasksController::class);

    $app->post('/tasks/delete', deleteTasksController::class);

    $app->post('/tasks/edit', editTasksController::class);

    $app->get('/completed', getCompletedTasksController::class);
};
