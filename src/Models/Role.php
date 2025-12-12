<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Role
{
    private PDO $db;
    private string $table = 'roles';

    public function __construct()
    {
        $this->db = Database::pdo();
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY name");
        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
