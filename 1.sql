CREATE DATABASE dosaaf_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE dosaaf_db;

CREATE TABLE certificate_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    certificate_name VARCHAR(255) NOT NULL,
    certificate_price DECIMAL(10, 2) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    comment TEXT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;