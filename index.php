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
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="page-shell">
        <section class="card">
            <div class="card-header">
                <h1>Đăng Nhập</h1>
                <p>Nhập tài khoản của bạn để truy cập vào hệ thống.</p>
            </div>

            <?php if ($flash !== null): ?>
                <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form action="login_process.php" method="POST" class="auth-form">
                <label for="username">Tên người dùng</label>
                <input type="text" id="username" name="username" placeholder="Nhập username" required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập password" required>

                <button type="submit">Đăng nhập</button>
            </form>

            <p class="card-footer">
                Chưa có tài khoản?
                <a href="register.php">Đăng ký ngay</a>
            </p>
        </section>
    </main>
</body>
</html>
