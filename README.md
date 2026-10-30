# Bài tập cá nhân MVC - Buổi 6
**Sinh viên thực hiện:** Đào Khánh Trung

## Nội dung hoàn thành
- [x] Refactor module quản lý Ghi chú cá nhân sang kiến trúc MVC.
- [x] Phân tách rõ ràng trách nhiệm các tầng:
  - `Controller` (`NoteController.php`): Nhận request, gọi xử lý logic và điều hướng.
  - `Repository` (`NoteRepository.php`): Xử lý hoàn toàn các câu lệnh SQL với PDO.
  - `View` (`index.php`, `create.php`): Chỉ chứa HTML hiển thị giao diện, không còn SQL.
  - `public/index.php`: Thiết lập Front Controller làm cổng vào duy nhất.
- [x] Tích hợp thành công Composer Autoload (`psr-4`).