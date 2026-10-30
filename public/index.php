<?php
// Tải các công cụ cần thiết
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/db.php';

use App\Controller\NoteController;
use App\Repository\NoteRepository;

// 1. Kết nối database
$pdo = db();

// 2. Khởi tạo các thành phần
$repository = new NoteRepository($pdo);
$controller = new NoteController($repository);

// 3. Điều hướng request (Router)
$action = $_GET['action'] ?? 'index';

if ($action === 'create') {
    $controller->create(); // Mở form thêm mới
} elseif ($action === 'store') {
    $controller->store();  // Lưu dữ liệu vào CSDL
} else {
    $controller->index();  // Hiển thị danh sách
}
?>