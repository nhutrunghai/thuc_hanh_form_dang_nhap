<?php
declare(strict_types=1);

require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('register.php');
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    set_flash('error', 'Vui lòng nhập đầy đủ thông tin đăng ký.');
    redirect('register.php');
}

if (strlen($username) < 3) {
    set_flash('error', 'Tên người dùng phải có ít nhất 3 ký tự.');
    redirect('register.php');
}

if (strlen($password) < 6) {
    set_flash('error', 'Mật khẩu phải có ít nhất 6 ký tự.');
    redirect('register.php');
}

$checkUser = $pdo->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
$checkUser->execute(['username' => $username]);

if ($checkUser->fetch() !== false) {
    set_flash('error', 'Tên người dùng đã tồn tại.');
    redirect('register.php');
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$insertUser = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
$insertUser->execute([
    'username' => $username,
    'password' => $hashedPassword,
]);

set_flash('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
redirect('index.php');
