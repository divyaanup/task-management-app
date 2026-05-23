<?php

require_once __DIR__ . '/../config/Database.php';

class TaskRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
}