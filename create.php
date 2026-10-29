<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $sql = "INSERT INTO notes (title, content) VALUES (:title, :content)";
        $stmt = db()->prepare($sql);
        $stmt->execute(['title' => $title, 'content' => $content]);
        header('Location: index.php');
        exit;
    } else {
        $error = "Vui lòng nhập đầy đủ Tiêu đề và Nội dung!";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Thêm Ghi chú Mới</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <p>Tiêu đề:</p>
        <input type="text" name="title" style="width: 300px;">
        <p>Nội dung:</p>
        <textarea name="content" style="width: 300px; height: 100px;"></textarea><br><br>
        <button type="submit">Lưu Ghi chú</button>
        <a href="index.php" style="margin-left: 10px;">Hủy</a>
    </form>
</body>
</html>