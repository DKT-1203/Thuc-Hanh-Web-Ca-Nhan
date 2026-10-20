<?php
$errors = [];
$data = ['name' => '', 'cc' => '', 'gk' => '', 'ck' => ''];
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['name'] = trim($_POST['name'] ?? '');
    $data['cc'] = trim($_POST['cc'] ?? '');
    $data['gk'] = trim($_POST['gk'] ?? '');
    $data['ck'] = trim($_POST['ck'] ?? '');

    // Kiểm tra lỗi (Validation)
    if ($data['name'] === '') $errors['name'] = 'Vui lòng nhập họ tên.';
    
    function validateScore($score, $field, &$errors) {
        if ($score === '') {
            $errors[$field] = 'Vui lòng nhập điểm.';
        } elseif (!is_numeric($score) || $score < 0 || $score > 10) {
            $errors[$field] = 'Điểm phải từ 0 đến 10.';
        }
    }
    validateScore($data['cc'], 'cc', $errors);
    validateScore($data['gk'], 'gk', $errors);
    validateScore($data['ck'], 'ck', $errors);

    // Tính điểm nếu không có lỗi
    if (empty($errors)) {
        $cc = (float)$data['cc'];
        $gk = (float)$data['gk'];
        $ck = (float)$data['ck'];
        $finalScore = ($cc * 0.1) + ($gk * 0.3) + ($ck * 0.6);

        if ($finalScore >= 8) $rank = 'Giỏi';
        elseif ($finalScore >= 6.5) $rank = 'Khá';
        elseif ($finalScore >= 5) $rank = 'Trung bình';
        else $rank = 'Chưa đạt';

        // Mã hóa bảo mật (Output encoding)
        $safeName = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
        $result = "Sinh viên <b>$safeName</b> có điểm tổng kết là: <b>" . number_format($finalScore, 1) . "</b> - Xếp loại: <b>$rank</b>";
    }
}
function e($val) { return htmlspecialchars($val, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Máy tính điểm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; font-size: 12px; }
        .form-group { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Máy Tính Điểm Học Phần</h2>
    <form method="POST">
        <div class="form-group">
            <label>Họ tên:</label><br>
            <input type="text" name="name" value="<?= e($data['name']) ?>">
            <div class="error"><?= $errors['name'] ?? '' ?></div>
        </div>
        <div class="form-group">
            <label>Điểm Chuyên cần (10%):</label><br>
            <input type="text" name="cc" value="<?= e($data['cc']) ?>">
            <div class="error"><?= $errors['cc'] ?? '' ?></div>
        </div>
        <div class="form-group">
            <label>Điểm Giữa kỳ (30%):</label><br>
            <input type="text" name="gk" value="<?= e($data['gk']) ?>">
            <div class="error"><?= $errors['gk'] ?? '' ?></div>
        </div>
        <div class="form-group">
            <label>Điểm Cuối kỳ (60%):</label><br>
            <input type="text" name="ck" value="<?= e($data['ck']) ?>">
            <div class="error"><?= $errors['ck'] ?? '' ?></div>
        </div>
        <button type="submit">Tính Điểm</button>
    </form>
    <hr>
    <?php if ($result): ?>
        <div style="color: green; font-size: 18px;"><?= $result ?></div>
    <?php endif; ?>
</body>
</html>