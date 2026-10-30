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
    // Hàm thêm ghi chú mới vào cơ sở dữ liệu
    public function insert(string $title, string $content): void {
        $stmt = $this->pdo->prepare("INSERT INTO notes (title, content) VALUES (:title, :content)");
        $stmt->execute(['title' => $title, 'content' => $content]);
    }
}
?>