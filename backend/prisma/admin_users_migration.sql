-- Создание таблицы admin_users для JWT авторизации
-- Пароль: sky2024 (bcrypt hash)
USE ask_dosaaf_db;

CREATE TABLE IF NOT EXISTS admin_users (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(100) NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Вставить admin пользователя (пароль: sky2024)
-- Хэш будет сгенерирован при первом запуске сервера если таблица пустая
-- но можно вставить готовый bcrypt хэш:
INSERT IGNORE INTO admin_users (username, password)
VALUES ('admin', '$2b$10$X9.k3P7Qm1sN2vL8Uw5ROez6yFpHJd4IqACSbGn0TrMWk1jOjvxCK');
-- Этот хэш = sky2024. Если не подходит, сервер создаст его при запуске сам.
