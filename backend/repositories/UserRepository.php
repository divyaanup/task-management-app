<?php

require_once __DIR__ . '/../config/Database.php';

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("
            SELECT * FROM users WHERE email = :email LIMIT 1
        ");

        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt->fetch();
    }
    public function create(array $data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)
        ");

        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);

        return $this->db->lastInsertId();
    }
}