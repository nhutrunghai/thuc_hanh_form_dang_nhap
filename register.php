<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if (is_logged_in()) {
    redirect('welcome.php');
}

$flash = get_flash();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="page-shell">
        <section class="card">
            <div class="card-header">
                <span class="eyebrow">Tạo tài khoản mới</span>
                <h1>Đăng Ký</h1>
            </div>

            <?php if ($flash !== null): ?>
                <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form action="register_process.php" method="POST" class="auth-form">
                <label for="username">Tên người dùng</label>
                <input type="text" id="username" name="username" placeholder="Tạo username" required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Tạo password" required>

                <button type="submit">Đăng ký</button>
            </form>

            <p class="card-footer">
                Đã có tài khoản?
                <a href="index.php">Quay lại đăng nhập</a>
            </p>
        </section>
    </main>
</body>
</html>
