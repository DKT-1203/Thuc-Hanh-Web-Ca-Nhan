<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghi chú Cá nhân - MVC</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 800px; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-add { padding: 8px 12px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-add:hover { background-color: #218838; }
    </style>
</head>
<body>
    <h2>Danh sách Ghi chú Cá nhân (Phiên bản chuẩn MVC)</h2>
    <a href="#" class="btn-add">+ Thêm Ghi chú mới</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
        </tr>
        <!-- Vòng lặp in dữ liệu từ Controller truyền sang -->
        <?php foreach ($data as $note): ?>
        <tr>
            <td><?= $note['id'] ?></td>
            <td><?= htmlspecialchars($note['title']) ?></td>
            <td><?= nl2br(htmlspecialchars($note['content'])) ?></td>
            <td><?= $note['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
        
        <?php if (empty($data)): ?>
        <tr>
            <td colspan="4" style="text-align: center;">Chưa có dữ liệu ghi chú.</td>
        </tr>
        <?php endif; ?>
    </table>
</body>
</html>