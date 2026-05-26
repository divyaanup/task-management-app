<?php
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../helpers/Response.php';
class AuthController
{
    public static function register()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['name'], $input['email'], $input['password'])) {
            Response::json([
                'message' => 'Missing required fields'
            ], 422);
            exit;
        }

        $repository = new UserRepository();

        // check if user exists
        $existingUser = $repository->findByEmail($input['email']);

        if ($existingUser) {
            Response::json([
                'message' => 'Email already exists',
                'user' => [
                    'id' => '',
                    'email' => ''
                ]
            ], 409);
            exit;
        }

        // hash password
        $hashedPassword = password_hash($input['password'], PASSWORD_BCRYPT);

        // create user
        $userId = $repository->create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $hashedPassword
        ]);

        Response::json([
            'message' => 'Registration successful',
            'user' => [
                'id' => $userId,
                'name' => $input['name'],
                'email' => $input['email']
            ]
        ], 201);
    }
    public static function login()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $repository = new UserRepository();

        $user = $repository->findByEmail($input['email']);
        // check password match or not
        if (!$user || !password_verify($input['password'], $user['password'])) {
        Response::json([
                'message' => 'Invalid credentials'
            ], 401);
            exit;
        }

        session_start();

        $_SESSION['user_id'] = $user['id'];

        Response::json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user['id'],
                'email' => $user['email']
            ]
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