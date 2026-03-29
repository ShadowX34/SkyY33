# Владимирский АСК ДОСААФ России — Сайт

Сайт аэроклуба с прыжками с парашютом.

## Стек технологий

| Слой | Технология |
|------|-----------|
| **База данных** | MySQL (ask_dosaaf_db) |
| **Backend** | Fastify + TypeScript + Prisma |
| **Frontend** | Vue 3 + Vite + TypeScript |

---

## Структура проекта

```
Sky/
├── backend/          ← Fastify REST API (порт 3000)
│   ├── src/
│   │   ├── routes/   ← публичные и admin маршруты
│   │   └── server.ts ← точка входа
│   ├── prisma/       ← схема БД
│   └── .env          ← DATABASE_URL, JWT_SECRET
│
├── frontend/         ← Vue 3 + Vite (порт 5173)
│   ├── src/
│   │   ├── views/    ← страницы сайта
│   │   ├── components/← NavBar, Footer, AdminLayout
│   │   ├── stores/   ← Pinia (auth)
│   │   ├── router/   ← Vue Router
│   │   └── api/      ← Axios клиент
│   └── public/
│       ├── images/   ← статичные изображения
│       └── uploads/  ← загружаемые файлы (галерея, новости)
│
└── [старые PHP файлы — для совместимости с XAMPP]
```

---

## Запуск (разработка)

### 1. База данных
Убедитесь что MySQL запущен в XAMPP и БД `ask_dosaaf_db` существует.

Если нет — выполнить в phpMyAdmin:
```sql
CREATE DATABASE ask_dosaaf_db;
```
Затем запустить `sql/admin_setup.sql` и `2.sql`.

### 2. Backend
```bash
cd backend
npm install
npx prisma generate
npm run dev
```

### 3. Добавить admin пользователя для JWT
При первом запуске сервер автоматически создаст пользователя `admin` с паролем `sky2024`.

### 4. Frontend
```bash
cd frontend
npm install
npm run dev
```

Открыть: http://localhost:5173

---

## Страницы

| Маршрут | Описание |
|---------|----------|
| `/` | Главная |
| `/about` | О нас |
| `/team` | Команда |
| `/reviews` | Отзывы |
| `/faq` | Вопрос-ответ |
| `/gallery` | Галерея |
| `/certificates` | Подарочные сертификаты |
| `/prices` | Цены |
| `/news` | Новости |
| `/stocks` | Акции |
| `/contacts` | Контакты |
| `/admin` | Админ-панель |

---

## API

Backend работает на `http://localhost:3000`.

| Метод | Маршрут | Описание |
|-------|---------|----------|
| GET | `/api/stocks` | Активные акции |
| GET | `/api/news` | Активные новости |
| GET | `/api/reviews` | Отзывы (slider/gratitude) |
| GET | `/api/gallery` | Фото из галереи |
| POST | `/api/orders` | Создать заказ сертификата |
| POST | `/api/admin/login` | Авторизация |
| GET/POST/PUT/DELETE | `/api/admin/stocks` | CRUD акций |
| GET/POST/PUT/DELETE | `/api/admin/news` | CRUD новостей |
| GET/POST/DELETE | `/api/admin/gallery` | Управление галереей |
| GET/POST/PUT/DELETE | `/api/admin/reviews` | CRUD отзывов |
| GET | `/api/admin/dashboard` | Статистика |
| PATCH | `/api/admin/orders/:id` | Смена статуса заказа |

---

## Авторизация в Админ-панели

- Логин: `admin`
- Пароль: `sky2024`
