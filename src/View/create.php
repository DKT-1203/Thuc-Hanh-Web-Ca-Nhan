<!DOCTYPE html>
<html lang="vi">
<head><title>Thêm Ghi chú</title></head>
<body style="font-family: Arial, sans-serif; margin: 20px;">
    <h2>Thêm Ghi chú Mới</h2>
    <!-- Form này sẽ gửi dữ liệu bằng POST đến action=store -->
    <form action="index.php?action=store" method="POST">
        <p>Tiêu đề:</p>
        <input type="text" name="title" style="width: 300px; padding: 5px;" required>
        <p>Nội dung:</p>
        <textarea name="content" style="width: 300px; height: 100px; padding: 5px;" required></textarea><br><br>
        <button type="submit" style="background: #28a745; color: white; padding: 8px 15px; border: none; cursor: pointer; font-weight: bold; border-radius: 4px;">Lưu Ghi chú</button>
        <a href="index.php" style="margin-left: 10px; text-decoration: none; color: #555;">Hủy</a>
    </form>
</body>
</html>