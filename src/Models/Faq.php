<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Faq extends Model
{
    protected $table = 'faqs';

    public function findAll(): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id): mixed
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (question, answer) VALUES (:question, :answer)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
    }

    public function update($id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET question = :question, answer = :answer WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'question' => $data['question'],
            'answer' => $data['answer'],
        ]);
    }

    public function delete($id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}
