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

// 3. Chạy chức năng hiển thị danh sách ghi chú
$controller->index();
?>