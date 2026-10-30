<?php
namespace App\Controller;
use App\Repository\NoteRepository;

class NoteController {
    private NoteRepository $notes;
    public function __construct(NoteRepository $notes) {
        $this->notes = $notes;
    }

    // Hàm xử lý trang chủ
    public function index(): void {
        // 1. Nhờ Repository lấy dữ liệu
        $data = $this->notes->findAll();

        // 2. Gọi file View để hiển thị HTML
        require __DIR__ . '/../View/index.php';
    }
    // Hàm gọi giao diện form thêm mới
    public function create(): void {
        require __DIR__ . '/../View/create.php';
    }

    // Hàm xử lý dữ liệu người dùng gửi lên qua form
    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);

            if ($title !== '' && $content !== '') {
                $this->notes->insert($title, $content); // Gọi Repository lưu data
                header('Location: index.php'); // Chuyển hướng về trang chủ
                exit;
            }
        }
    }
}
?>