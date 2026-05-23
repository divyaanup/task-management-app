<?php
require_once __DIR__ . '/../repositories/TaskRepository.php';
require_once __DIR__ . '/../helpers/Response.php';
class TaskController
{
    public static function index($userId)
    {
        $repository = new TaskRepository();

        $status = $_GET['status'] ?? null;

        $tasks = $repository->getAllByUser($userId, $status);

        Response::json($tasks);
    }

    public static function create($userId)
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $repository = new TaskRepository();

        $taskId = $repository->create($input, $userId);

        Response::json([
            'message' => 'Task created',
            'task_id' => $taskId
        ], 201);
    }

    public static function update($userId)
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $repository = new TaskRepository();

        $repository->update($input['id'], $userId, $input);

        Response::json([
            'message' => 'Task updated'
        ]);
    }
    

    public static function delete($userId)
    {
        $taskId = $_GET['id'];

        $repository = new TaskRepository();

        $repository->delete($taskId, $userId);

        Response::json([
            'message' => 'Task deleted'
        ]);
    }
}