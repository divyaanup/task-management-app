<?php

require_once __DIR__ . '/../helpers/Response.php';

class AuthMiddleware
{
    public static function handle()
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            Response::json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return $_SESSION['user_id'];
    }
}