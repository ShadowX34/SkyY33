<?php
// sky-control/prices.php
require 'auth.php';
require '../includes/db_connect.php';

$msg = $_GET['msg'] ?? '';

// Получаем все записи цен из базы данных
$prices = [];
$dbEmpty = false;
try {
    $prices = $pdo->query("SELECT * FROM prices ORDER BY category ASC, sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
    if (empty($prices)) {
        $dbEmpty = true;
    }
} catch (PDOException $e) {
    $dbEmpty = true;
}

$jumps = [];
$rent = [];
$rigger = [];
$certificates = [];

foreach ($prices as $p) {
    if ($p['category'] === 'jumps') {
        $jumps[] = $p;
    } elseif ($p['category'] === 'rent') {
        $rent[] = $p;
    } elseif ($p['category'] === 'rigger') {
        $rigger[] = $p;
    } elseif ($p['category'] === 'certificates') {
        $certificates[] = $p;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Управление ценами — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
.prices-container {
    max-width: 1200px;
}
.prices-tabs {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    border-bottom: 1px solid var(--border);
    padding-bottom: 10px;
    flex-wrap: wrap;
}
.tab-btn {
    padding: 10px 20px;
    background: #e9ecef;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    color: #495057;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
}
.tab-btn.active {
    background: var(--primary);
    color: white;
}
.tab-content {
    display: none;
}
.tab-content.active {
    display: block;
}
.price-input {
    width: 120px !important;
    text-align: right;
    font-weight: bold;
}
.desc-textarea {
    min-height: 60px;
    font-size: 0.85rem;
}
.save-bar {
    position: sticky;
    bottom: 0;
    background: white;
    padding: 15px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: flex-end;
    margin-top: 30px;
    box-shadow: 0 -4px 10px rgba(0,0,0,0.05);
    border-radius: 8px;
    z-index: 10;
}
</style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-ruble-sign"></i> Цены и услуги</h1>
    </div>
    <div class="content prices-container">
        <?php if ($msg === 'success'): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Цены успешно сохранены и обновлены на сайте!</div>
        <?php elseif ($msg === 'error'): ?>
        <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Ошибка при выполнении операции. Убедитесь, что все поля заполнены корректно.</div>
        <?php endif; ?>

        <?php if ($dbEmpty): ?>
        <div class="alert alert-danger" style="flex-direction: column; align-items: flex-start; gap: 15px; padding: 25px;">
            <div>
                <strong style="font-size: 1.1rem; display: block; margin-bottom: 5px;"><i class="fas fa-exclamation-triangle"></i> Внимание: Таблица цен в базе данных не создана или пуста!</strong>
                На сайте сейчас отображаются резервные жестко захардкоженные цены. Для полноценной работы панели управления необходимо импортировать SQL-файл миграции в вашу базу данных.
            </div>
            <div style="background: rgba(0,0,0,0.05); padding: 12px 15px; border-radius: 6px; width: 100%; font-family: monospace; font-size: 0.85rem;">
                Файл миграции расположен по пути: <strong>sql/add_prices_table.sql</strong><br>
                Импортируйте его через phpMyAdmin в базу данных <strong>ask_dosaaf_db</strong>, после чего обновите эту страницу.
            </div>
        </div>
        <?php endif; ?>

        <form method="post" action="prices_save.php">
            <!-- Вкладки категорий -->
            <div class="prices-tabs">
                <button type="button" class="tab-btn active" onclick="switchTab(event, 'jumps-tab')">
                    <i class="fas fa-parachute-box"></i> Прыжки и полёты
                </button>
                <button type="button" class="tab-btn" onclick="switchTab(event, 'rent-tab')">
                    <i class="fas fa-tshirt"></i> Аренда снаряжения
                </button>
                <button type="button" class="tab-btn" onclick="switchTab(event, 'rigger-tab')">
                    <i class="fas fa-tools"></i> Риггерские услуги
                </button>
                <button type="button" class="tab-btn" onclick="switchTab(event, 'certs-tab')">
                    <i class="fas fa-award"></i> Подарочные сертификаты
                </button>
            </div>

            <!-- 1. Прыжки и полёты -->
            <div id="jumps-tab" class="tab-content active card">
                <div class="card-header">
                    <h2>Управление ценами на прыжки и полёты</h2>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Наименование услуги</th>
                                <th style="width: 100px;">Ед. изм.</th>
                                <th style="width: 180px;">Цена (₽)</th>
                                <th style="width: 70px; text-align: center;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($jumps as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][name]" value="<?= htmlspecialchars($p['service_name']) ?>" required>
                                </td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][unit]" value="<?= htmlspecialchars($p['unit']) ?>" required>
                                </td>
                                <td>
                                    <input type="number" name="services[<?= $p['id'] ?>][price]" value="<?= (int)$p['price'] ?>" class="price-input" min="0" required>
                                </td>
                                <td style="text-align: center;">
                                    <a href="prices_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту услугу?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($jumps)): ?>
                            <tr><td colspan="5" style="text-align: center; color: #888;">Нет данных. Выполните миграцию БД.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 2. Аренда снаряжения -->
            <div id="rent-tab" class="tab-content card">
                <div class="card-header">
                    <h2>Управление ценами на аренду снаряжения</h2>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Наименование услуги</th>
                                <th style="width: 100px;">Ед. изм.</th>
                                <th style="width: 180px;">Цена (₽)</th>
                                <th style="width: 70px; text-align: center;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rent as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][name]" value="<?= htmlspecialchars($p['service_name']) ?>" required>
                                </td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][unit]" value="<?= htmlspecialchars($p['unit']) ?>" required>
                                </td>
                                <td>
                                    <input type="number" name="services[<?= $p['id'] ?>][price]" value="<?= (int)$p['price'] ?>" class="price-input" min="0" required>
                                </td>
                                <td style="text-align: center;">
                                    <a href="prices_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту услугу?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($rent)): ?>
                            <tr><td colspan="5" style="text-align: center; color: #888;">Нет данных. Выполните миграцию БД.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 3. Риггерские услуги -->
            <div id="rigger-tab" class="tab-content card">
                <div class="card-header">
                    <h2>Управление ценами на риггерские услуги</h2>
                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Наименование услуги</th>
                                <th style="width: 100px;">Ед. изм.</th>
                                <th style="width: 180px;">Цена (₽)</th>
                                <th style="width: 70px; text-align: center;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($rigger as $p): ?>
                            <tr>
                                <td><?= $p['id'] ?></td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][name]" value="<?= htmlspecialchars($p['service_name']) ?>" required>
                                </td>
                                <td>
                                    <input type="text" name="services[<?= $p['id'] ?>][unit]" value="<?= htmlspecialchars($p['unit']) ?>" required>
                                </td>
                                <td>
                                    <input type="number" name="services[<?= $p['id'] ?>][price]" value="<?= (int)$p['price'] ?>" class="price-input" min="0" required>
                                </td>
                                <td style="text-align: center;">
                                    <a href="prices_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту услугу?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($rigger)): ?>
                            <tr><td colspan="5" style="text-align: center; color: #888;">Нет данных. Выполните миграцию БД.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 4. Подарочные сертификаты -->
            <div id="certs-tab" class="tab-content card">
                <div class="card-header">
                    <h2>Управление подарочными сертификатами</h2>
                </div>
                <div class="card-body">
                    <p style="margin-bottom: 20px; font-size: 0.88rem; color: #666;">
                        <i class="fas fa-info-circle"></i> Здесь вы можете изменить не только цену сертификата, но и его название и краткое описание, которое показывается на странице заказа сертификатов.
                    </p>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th style="width: 250px;">Название сертификата</th>
                                <th>Описание сертификата</th>
                                <th style="width: 150px;">Цена (₽)</th>
                                <th style="width: 70px; text-align: center;">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($certificates as $p): ?>
                            <tr>
                                <td style="vertical-align: top; padding-top: 15px;"><?= $p['id'] ?></td>
                                <td style="vertical-align: top; padding-top: 15px;">
                                    <input type="text" name="services[<?= $p['id'] ?>][name]" value="<?= htmlspecialchars($p['service_name']) ?>" required style="font-weight: 600;">
                                    <div style="font-size: 0.75rem; color: #888; margin-top: 5px; font-family: monospace;">
                                        Картинка: <?= htmlspecialchars($p['image']) ?>
                                    </div>
                                    <input type="hidden" name="services[<?= $p['id'] ?>][unit]" value="1">
                                </td>
                                <td>
                                    <textarea name="services[<?= $p['id'] ?>][description]" class="desc-textarea" required><?= htmlspecialchars($p['description'] ?? '') ?></textarea>
                                </td>
                                <td style="vertical-align: top; padding-top: 15px;">
                                    <input type="number" name="services[<?= $p['id'] ?>][price]" value="<?= (int)$p['price'] ?>" class="price-input" min="0" required>
                                </td>
                                <td style="vertical-align: top; padding-top: 15px; text-align: center;">
                                    <a href="prices_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот сертификат?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($certificates)): ?>
                            <tr><td colspan="5" style="text-align: center; color: #888;">Нет данных. Выполните миграцию БД.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Закрепленная панель сохранения -->
            <?php if (!$dbEmpty): ?>
            <div class="save-bar">
                <button type="submit" class="btn btn-success" style="padding: 12px 30px; font-size: 1rem;">
                    <i class="fas fa-save"></i> Сохранить изменения
                </button>
            </div>
            <?php endif; ?>
        </form>

        <!-- КАРТОЧКА ДОБАВЛЕНИЯ НОВОЙ УСЛУГИ -->
        <?php if (!$dbEmpty): ?>
        <div class="card" style="margin-top: 30px;">
            <div class="card-header">
                <h2><i class="fas fa-plus-circle"></i> Добавить новую услугу или сертификат</h2>
            </div>
            <div class="card-body">
                <form method="post" action="prices_add.php">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="new_name">Название услуги *</label>
                            <input type="text" id="new_name" name="name" placeholder="Например: Аренда шлема" required>
                        </div>
                        <div class="form-group">
                            <label for="new_category">Категория *</label>
                            <select id="new_category" name="category" required onchange="toggleDescField(this.value)">
                                <option value="jumps">Прыжки и полёты</option>
                                <option value="rent">Аренда снаряжения</option>
                                <option value="rigger">Риггерские услуги</option>
                                <option value="certificates">Подарочный сертификат</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="new_unit">Ед. измерения</label>
                            <input type="text" id="new_unit" name="unit" value="1" placeholder="Например: 1 день, 1 прыжок">
                        </div>
                        <div class="form-group">
                            <label for="new_price">Цена (₽) *</label>
                            <input type="number" id="new_price" name="price" min="0" placeholder="Например: 500" required>
                        </div>
                        <div class="form-group span2" id="desc_group" style="display: none;">
                            <label for="new_desc">Описание сертификата *</label>
                            <textarea id="new_desc" name="description" placeholder="Краткое описание подарочного сертификата..."></textarea>
                        </div>
                        <div class="form-group span2" id="image_group" style="display: none;">
                            <label for="new_image">Путь к картинке (или оставьте пустым)</label>
                            <input type="text" id="new_image" name="image" placeholder="Например: images/б1.webp">
                        </div>
                    </div>
                    <div style="margin-top: 20px; display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary" style="padding: 10px 24px;"><i class="fas fa-plus"></i> Добавить услугу</button>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function switchTab(evt, tabId) {
    // Скрываем все вкладки
    const tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("active");
    }

    // Деактивируем все кнопки вкладок
    const tabBtns = document.getElementsByClassName("tab-btn");
    for (let i = 0; i < tabBtns.length; i++) {
        tabBtns[i].classList.remove("active");
    }

    // Показываем текущую вкладку и делаем кнопку активной
    document.getElementById(tabId).classList.add("active");
    evt.currentTarget.classList.add("active");
}

function toggleDescField(category) {
    const descGroup = document.getElementById('desc_group');
    const imageGroup = document.getElementById('image_group');
    const descInput = document.getElementById('new_desc');
    
    if (category === 'certificates') {
        descGroup.style.display = 'flex';
        imageGroup.style.display = 'flex';
        descInput.setAttribute('required', 'required');
    } else {
        descGroup.style.display = 'none';
        imageGroup.style.display = 'none';
        descInput.removeAttribute('required');
    }
}
</script>
</body>
</html>
