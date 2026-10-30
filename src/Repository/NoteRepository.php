<?php
namespace App\Repository;
use PDO;

class NoteRepository {
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Hàm lấy toàn bộ ghi chú từ CSDL
    public function findAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM notes ORDER BY id DESC');
        return $stmt->fetchAll();
    }
}
?>