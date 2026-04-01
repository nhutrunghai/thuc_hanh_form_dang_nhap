CREATE DATABASE IF NOT EXISTS thuc_hanh_dang_nhap_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE thuc_hanh_dang_nhap_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
