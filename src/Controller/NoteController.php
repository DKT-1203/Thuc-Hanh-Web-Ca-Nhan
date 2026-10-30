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
}
?>