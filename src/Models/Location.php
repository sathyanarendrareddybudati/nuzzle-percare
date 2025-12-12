<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Location
{
    private PDO $db;
    private string $table = 'locations';

    public function __construct()
    {
        $this->db = Database::pdo();
    }

    public function create(array $data): int
    {
        $sql = "INSERT INTO {$this->table} (name, city, state, country, latitude, longitude)
                VALUES (:name, :city, :state, :country, :latitude, :longitude)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name' => $data['name'],
            ':city' => $data['city'],
            ':state' => $data['state'],
            ':country' => $data['country'],
            ':latitude' => $data['latitude'] ?? null,
            ':longitude' => $data['longitude'] ?? null,
        ]);
        return (int)$this->db->lastInsertId();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY name");
        return $stmt->fetchAll();
    }
}
