-- =====================================================
-- ВЛАДИМИРСКИЙ АСК ДОСААФ РОССИИ
-- Мастер-файл структуры базы данных (Схема)
-- Файл: init_db.sql
-- =====================================================

CREATE DATABASE IF NOT EXISTS ask_dosaaf_db;
USE ask_dosaaf_db;

-- 1. Таблица заказов сертификатов
CREATE TABLE IF NOT EXISTS certificate_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    certificate_name VARCHAR(255) NOT NULL,
    certificate_price DECIMAL(10, 2) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Таблица акций
CREATE TABLE IF NOT EXISTS stocks (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NOT NULL,
    description TEXT,
    tag         VARCHAR(100),
    price_label VARCHAR(100),
    detail_text VARCHAR(255),
    image       VARCHAR(255),
    is_active   TINYINT(1) DEFAULT 1,
    sort_order  INT DEFAULT 0,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Таблица новостей
CREATE TABLE IF NOT EXISTS news (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NOT NULL,
    excerpt     TEXT,
    tag         VARCHAR(100),
    image       VARCHAR(255),
    pub_date    DATE NOT NULL,
    is_active   TINYINT(1) DEFAULT 1,
    sort_order  INT DEFAULT 0,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Таблица отзывов
CREATE TABLE IF NOT EXISTS reviews (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    type        ENUM('slider','gratitude') DEFAULT 'slider',
    image       VARCHAR(255),
    author_name VARCHAR(255) DEFAULT '',
    review_text TEXT,
    caption     TEXT,
    sort_order  INT DEFAULT 0,
    is_active   TINYINT(1) DEFAULT 1,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Таблица галереи
CREATE TABLE IF NOT EXISTS gallery_photos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    filename    VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- ТЕСТОВЫЕ ДАННЫЕ (SЕЕD DATA)
-- =====================================================

-- Акции
INSERT INTO stocks (title, description, tag, price_label, detail_text, image, is_active, sort_order) VALUES
('ДЕНЬ РОЖДЕНИЯ - СКИДКА 10%', 'Предъяви паспорт и получи скидку 10% в свой день рождения!', '-10%', 'Получить скидку', 'Действует в течение 3 дней до и после дня рождения;Распространяется на все виды прыжков;Не суммируется с другими акциями;Дополнительные привилегии', 'images/скидка.webp', 1, 10),
('СКИДКА 500₽ В БУДНИЙ ДЕНЬ', 'Специальное предложение для тех, кто может прыгать в будни!', '-500₽', 'Записаться в будний день', 'Действует по четвергам в дни проведения прыжков;Не распространяется на выходные и праздники;При покупке сертификата скидка фиксируется;Дополнительные привилегии', 'images/скидка2.webp', 1, 20),
('«ПРИВЕДИ ДРУГА» - 5% СКИДКА', 'Приводите друзей и получайте скидку за каждого!', '-5%', 'Участвовать в акции', '5% скидка за каждого приведённого друга;Максимальная скидка - 20%;Друзья тоже получают скидку 5%;Скидка действует на следующий прыжок', 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 1, 30);

-- Новости
INSERT INTO news (title, excerpt, pub_date, image, is_active) VALUES
('НОВОГОДНИЕ СКИДКИ НА ПОДАРОЧНЫЕ СЕРТИФИКАТЫ', 'Зима — это по-настоящему волшебное время, когда всё вокруг превращается в сказку...', '2024-12-05', 'images/New Year.webp', 1),
('ОТКРЫТИЕ СЕЗОНА 2024', 'Старт нового сезона прыжков с парашютом! Уже 15 апреля мы открываем сезон...', '2024-04-09', 'images/News2.jpg', 1),
('ОТКРЫТИЕ СЕЗОНА 2023', 'Старт нового сезона прыжков с парашютом! Уже 21 апреля мы открываем сезон...', '2023-04-18', 'images/News.jpg', 1),
('ЛЮБОВЬ И СТИХИЯ: ВЛАДИМИРСКИЕ СЕМЬИ РАССКАЗАЛИ СВОИ ИСТОРИИ', 'Семейные пары во Владимирском регионе не только тушят огонь, но и покоряют небо вместе...', '2022-09-08', 'images/Парашутист.jpg', 1);
