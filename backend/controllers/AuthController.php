<?php
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../helpers/Response.php';
class AuthController
{
    public static function login()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $repository = new UserRepository();

        $user = $repository->findByEmail($input['email']);
        if (!$user || !password_verify($input['password'], $user['password'])) {
        Response::json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        session_start();

        $_SESSION['user_id'] = $user['id'];

        Response::json([
            'message' => 'Login successful'
        ]);
    }

    public static function logout()
    {
        session_start();

        session_destroy();

        Response::json([
            'message' => 'Logged out'
        ]);
    }
}