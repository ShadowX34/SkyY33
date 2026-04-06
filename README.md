# Владимирский АСК ДОСААФ России - Прыжки с парашютом

Официальный сайт Владимирского аэроклуба.

## 🛠 Технологический стек
- **Backend:** PHP 7.4+
- **Database:** MySQL (PDO / Mysqli)
- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Server:** XAMPP (Apache)

## 📂 Структура проекта
- `index.php`, `about.php` и др. — Основные страницы сайта.
- `admin/` — Панель управления (управление заказами, новостями, акциями и галереей).
- `includes/` — Модульные части сайта (Header, Footer) и конфигурация БД.
- `css/` — Стили страниц.
- `js/` — Клиентские скрипты.
- `images/` — Медиа-активы (фото, логотипы, фоны).
- `sql/` — Скрипты для инициализации и обновления базы данных.
- `docs/` — Инструкции и данные для администратора.

## 🚀 Запуск (Локально)
1. Установите **XAMPP**.
2. Скопируйте папку проекта в `C:\xampp\htdocs\Sky`.
3. Запустите Apache и MySQL в панели управления XAMPP.
4. Импортируйте базу данных из `sql/init_db.sql` (используйте phpMyAdmin).
5. Проверьте настройки подключения в `includes/db_connect.php` и `includes/config.php`.
6. Откройте сайт по адресу: `http://localhost/Sky/` или используйте файл `ЗАПУСТИТЬ_САЙТ.bat`.

---

### 🎨 Оптимизация CSS и архитектуры
- **Рефакторинг стилей:** Полностью удалены лишние файлы `style.css` и `transitions.css`. Базовые анимации и глобальные стили перенесены в `global.css`.
- **Унификация заголовков:** Консолидированы все классы заголовков секций (`.section-title`, `.sections-title`, `.section-tit` и др.). Теперь везде используется единый стиль и единые медиа-запросы.
- **Модульность:** Оптимизирована логика подключения CSS в `header.php`, что уменьшило количество HTTP-запросов и исключило конфликты стилей.

### 🐛 Исправление багов и UI
- **Видимость заголовков:** Исправлен критический баг «исчезающих» заголовков на главной странице, вызванный конфликтом между CSS-правилами и `IntersectionObserver` в JS.
- **Карточки "Акции" и "Новости":** 
    - Исправлено отображение фото в блоке акций (`index.php` и `stocks.php`). Фото теперь корректно заполняют карточку (`object-fit: cover`) без пустых полей.
    - Возвращены градиентные подложки на карточки новостей для читаемости белого текста.
- **Типографика:** Добавлены адаптивные размеры шрифтов для заголовков на мобильных устройствах (768px и 576px).

### 🚀 Recent Updates (English)
- **Image Handling:** Standardized image path resolution for "Stocks" and "News" across the homepage, dedicated pages, and the Admin panel. Fixed broken external image links in the database.
- **Mobile Navigation:** Resolved burger menu initialization conflicts on `faq.php` and `reviews.php`.
- **Performance Optimization:** Refactored the Video section in `gallery.php` to use lightweight link-based cards, significantly improving page load times and mobile usability.
- **Responsive Design:** Optimized the price table for mobile devices (hidden redundant columns, improved scrolling).
- **Localization:** Standardized date formatting to Russian month names across all News sections.
- **Compliance:** Created a dedicated Privacy Policy page (`privacy.php`) and linked it from the Contacts section.

---
*Проект Владимирского АСК ДОСААФ России.*
