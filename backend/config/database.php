<?php

declare(strict_types=1);

class Database
{
    private static ?PDO $instance = null;

    public static function connect(): PDO
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/dbconfig.php';
            $host = $config['db_host'];
            $db   = $config['db_name'];
            $user = $config['db_user'];
            $pass = $config['db_pass'];
            $charset = $config['db_charset'];

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            try {

                self::$instance = new PDO(
                    $dsn,
                    $user,
                    $pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );

            } catch (PDOException $e) {

                http_response_code(500);

                echo json_encode([
                    'message' => 'Database connection failed',
                    'error' => $e->getMessage()
                ]);

                exit;
            }
        }

        return self::$instance;
    }
}