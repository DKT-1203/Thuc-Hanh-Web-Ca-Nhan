<?php
require 'db.php';
$pdo = db();
$keyword = $_GET['search'] ?? '';

$sql = "SELECT * FROM notes WHERE title LIKE :kw ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['kw' => '%' . $keyword . '%']);
$notes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Ghi chú của tôi</title></head>
<body>
    <h2>Danh sách Ghi chú Cá nhân</h2>
    <form method="GET">
        <input type="text" name="search" value="<?= htmlspecialchars($keyword) ?>" placeholder="Tìm tiêu đề...">
        <button type="submit">Tìm kiếm</button>
    </form>
    <br>
    <a href="create.php"><button>+ Thêm Ghi chú mới</button></a>
    <table border="1" cellpadding="10" style="margin-top:15px; width: 600px; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th> <th>Tiêu đề</th> <th>Nội dung</th> <th>Thao tác</th>
        </tr>
        <?php foreach ($notes as $note): ?>
        <tr>
            <td><?= $note['id'] ?></td>
            <td><?= htmlspecialchars($note['title']) ?></td>
            <td><?= nl2br(htmlspecialchars($note['content'])) ?></td>
            <td>
                <form action="delete.php" method="POST" onsubmit="return confirm('Xóa ghi chú này?');">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button type="submit" style="color: red;">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>