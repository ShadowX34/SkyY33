CREATE DATABASE ask_dosaaf_db;

USE ask_dosaaf_db;

-- Добавьте эту таблицу к существующей базе данных
CREATE TABLE certificate_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    certificate_name VARCHAR(255) NOT NULL,
    certificate_price DECIMAL(10, 2) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    comment TEXT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'processed', 'completed', 'cancelled') DEFAULT 'pending'
);