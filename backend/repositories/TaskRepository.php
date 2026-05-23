<?php

require_once __DIR__ . '/../config/Database.php';

class TaskRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllByUser(int $userId, ?string $status = null)
    {
        $sql = "
            SELECT *
            FROM tasks
            WHERE user_id = :user_id
        ";

        $params = [
            ':user_id' => $userId
        ];

        if ($status) {
            $sql .= " AND status = :status";
            $params[':status'] = $status;
        }

        $sql .= " ORDER BY due_date ASC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    public function create(array $data, int $userId)
    {
        $stmt = $this->db->prepare("
            INSERT INTO tasks (user_id, name, due_date, status)
            VALUES (:user_id, :name, :due_date, :status)
        ");

        $stmt->execute([
            ':user_id' => $userId,
            ':name' => $data['name'],
            ':due_date' => $data['due_date'],
            ':status' => $data['status'] ?? 'active'
        ]);

        return $this->db->lastInsertId();
    }

    public function update(int $taskId, int $userId, array $data)
    {
        $stmt = $this->db->prepare("
            UPDATE tasks
            SET
                name = :name,
                due_date = :due_date,
                status = :status
            WHERE id = :id
            AND user_id = :user_id
        ");

        return $stmt->execute([
            ':id' => $taskId,
            ':user_id' => $userId,
            ':name' => $data['name'],
            ':due_date' => $data['due_date'],
            ':status' => $data['status']
        ]);
    }

    public function delete(int $taskId, int $userId)
    {
        $stmt = $this->db->prepare("
            DELETE FROM tasks
            WHERE id = :id
            AND user_id = :user_id
        ");

        return $stmt->execute([
            ':id' => $taskId,
            ':user_id' => $userId
        ]);
    }
}