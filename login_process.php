<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    set_flash('error', 'Vui lòng nhập đầy đủ tên người dùng và mật khẩu.');
    redirect('index.php');
}

$statement = $pdo->prepare('SELECT id, username, password FROM users WHERE username = :username LIMIT 1');
$statement->execute(['username' => $username]);
$user = $statement->fetch();

if ($user !== false && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
    ];

    set_flash('success', 'Đăng nhập thành công!');
    redirect('welcome.php');
}

set_flash('error', 'Đăng nhập thất bại!');
redirect('index.php');
