<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if (!is_logged_in()) {
    set_flash('error', 'Bạn cần đăng nhập để truy cập trang này.');
    redirect('index.php');
}

$flash = get_flash();
$username = $_SESSION['user']['username'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Mừng</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="page-shell">
        <section class="card">
            <div class="card-header">
                <span class="eyebrow">Truy cập thành công</span>
                <h1>Xin chào, <?= htmlspecialchars($username) ?>!</h1>
                <p>Đây là trang chức năng chính sau khi đăng nhập thành công.</p>
            </div>

            <?php if ($flash !== null): ?>
                <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                    <?= htmlspecialchars($flash['message']) ?>
                </div>
            <?php endif; ?>

            <div class="welcome-box">
                <a class="secondary-button" href="logout.php">Đăng xuất</a>
            </div>
        </section>
    </main>
</body>
</html>
