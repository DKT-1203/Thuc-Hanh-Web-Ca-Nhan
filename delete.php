<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    $sql = "DELETE FROM notes WHERE id = :id";
    $stmt = db()->prepare($sql);
    $stmt->execute(['id' => (int)$_POST['id']]);
}
header('Location: index.php');
exit;
?>