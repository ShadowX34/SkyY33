<?php
require 'auth.php';
require '../includes/db_connect.php';

/**
 * ─── ДИПЛОМНЫЙ КОММЕНТАРИЙ: АРХИТЕКТУРА УПРАВЛЕНИЯ КОНТЕНТОМ (АДМИНКА) ───
 * 
 * 1. ДИНАМИЧЕСКИЙ И СТАТИЧЕСКИЙ КОНТЕНТ:
 *    Данный скрипт разделяет фотографии на две группы:
 *    - Загруженные через СУБД: записи хранятся в таблице `gallery_photos`.
 *    - Статичные файлы: файлы, загруженные вручную в папку `images/gallery/` по FTP или локально.
 *    Это обеспечивает гибкость администрирования.
 * 
 * 2. ЭРГОНОМИКА И ИНТЕРФЕЙС (UX/UI):
 *    Реализовано пакетное (мульти-выбор) удаление файлов с диска для удобства работы администратора.
 *    Для соответствия спецификации HTML5 (запрет вложенных тегов <form>), одиночные кнопки удаления
 *    интегрированы с единой формой через JavaScript-обработчик.
 */

$msg = $_GET['msg'] ?? '';
$uploaded = $pdo->query("SELECT * FROM gallery_photos ORDER BY uploaded_at DESC")->fetchAll(PDO::FETCH_ASSOC);

// Получаем список файлов из БД для фильтрации
$dbFilenames = array_column($uploaded, 'filename');
$dbFilenamesSet = array_flip($dbFilenames);

// Сканируем папку на наличие статичных файлов (которых нет в БД)
$allFiles = glob('../images/gallery/*.*') ?: [];
$staticPhotos = [];
foreach ($allFiles as $f) {
    $filename = basename($f);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if (!isset($dbFilenamesSet[$filename]) && in_array($ext, ['jpg','jpeg','png','webp','mp4','webm','ogg','mov','avi'])) {
        $staticPhotos[] = $filename;
    }
}
$staticCount = count($staticPhotos);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Галерея — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 12px; }
.gallery-item { position: relative; border-radius: 8px; overflow: hidden; background: #f0f0f0; aspect-ratio: 1; transition: transform 0.2s; }
.gallery-item:hover { transform: scale(1.02); box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; }
.gallery-item .del-btn { position: absolute; top: 6px; right: 6px; z-index: 10; padding: 5px 8px; font-size: 0.75rem; border-radius: 4px; }
.gallery-item .select-checkbox { position: absolute; top: 8px; left: 8px; z-index: 10; width: 18px; height: 18px; cursor: pointer; accent-color: var(--primary); }
.gallery-item .filename { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.55); color: white; font-size: 0.7rem; padding: 4px 6px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
</style>
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-images"></i> Галерея</h1>
    </div>
    <div class="content">
        <?php if ($msg === 'uploaded'): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Фото успешно загружено</div>
        <?php elseif ($msg === 'deleted'): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Выбранные фото успешно удалены</div>
        <?php elseif ($msg === 'error'): ?>
        <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Ошибка при загрузке</div>
        <?php endif; ?>

        <div class="stats-grid" style="grid-template-columns:repeat(3,1fr);max-width:500px">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-photo-video"></i></div>
                <div class="stat-info"><h3><?= $staticCount ?></h3><p>Статичных фото</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-upload"></i></div>
                <div class="stat-info"><h3><?= count($uploaded) ?></h3><p>В базе данных</p></div>
            </div>
        </div>

        <!-- Форма загрузки -->
        <div class="card">
            <div class="card-header"><h2>Загрузить новые фото и видео</h2></div>
            <div class="card-body">
                <form method="post" action="gallery_upload.php" enctype="multipart/form-data" style="display:flex;gap:10px;align-items:flex-end;flex-wrap:wrap">
                    <div class="form-group" style="flex:1;min-width:250px">
                        <label>Выберите изображения или видео (jpg, jpeg, png, webp, mp4, webm, ogg, mov, avi)</label>
                        <input type="file" name="images[]" accept="image/*,video/*" multiple required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Загрузить</button>
                </form>
            </div>
        </div>

        <!-- Панель пакетного удаления -->
        <div class="card" style="margin-bottom: 20px;">
            <div class="card-body" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px; padding:15px 22px;">
                <h3 style="font-size:1rem; color:var(--primary-dark); margin:0;">
                    <i class="fas fa-tasks"></i> Пакетное управление
                </h3>
                <div style="display:flex; gap:10px;">
                    <button type="button" id="selectAllBtn" class="btn btn-sm btn-secondary">
                        <i class="far fa-check-square"></i> Выбрать все
                    </button>
                    <button type="button" onclick="submitBulkDelete()" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Удалить выбранные (<span id="selectedCount">0</span>)
                    </button>
                </div>
            </div>
        </div>

        <!-- Единая форма для удаления выбранных фото -->
        <form id="galleryForm" method="post" action="gallery_bulk_delete.php">

            <!-- Загруженные через админку (из БД) -->
            <?php if ($uploaded): ?>
            <div class="card">
                <div class="card-header"><h2>Медиафайлы из базы данных (<?= count($uploaded) ?>)</h2></div>
                <div class="card-body">
                    <div class="gallery-grid">
                    <?php foreach ($uploaded as $p): ?>
                        <?php 
                        $val = "db:" . $p['id'] . "|" . $p['filename']; 
                        $ext = strtolower(pathinfo($p['filename'], PATHINFO_EXTENSION));
                        $isVideo = in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi']);
                        ?>
                        <div class="gallery-item">
                            <input type="checkbox" name="selected_photos[]" class="photo-checkbox select-checkbox" value="<?= htmlspecialchars($val) ?>">
                            <?php if ($isVideo): ?>
                                <video src="../images/gallery/<?= htmlspecialchars($p['filename']) ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;"></video>
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; background: rgba(0,0,0,0.6); padding: 8px 12px; border-radius: 50%; pointer-events: none; z-index: 5;">
                                    <i class="fas fa-play"></i>
                                </div>
                            <?php else: ?>
                                <img src="../images/gallery/<?= htmlspecialchars($p['filename']) ?>" alt="" loading="lazy"
                                     onerror="this.parentElement.style.background='#fee'">
                            <?php endif; ?>
                            <span class="filename"><?= htmlspecialchars($p['filename']) ?></span>
                            <button type="button" class="btn btn-sm btn-danger del-btn" onclick="deleteSinglePhoto('<?= htmlspecialchars($val) ?>')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="alert alert-info"><i class="fas fa-info-circle"></i> Загруженных файлов пока нет. Используйте форму выше.</div>
            <?php endif; ?>

            <!-- Статичные фотографии по умолчанию -->
            <?php if ($staticPhotos): ?>
            <div class="card" style="margin-top:25px;">
                <div class="card-header"><h2>Статичные медиафайлы по умолчанию (<?= count($staticPhotos) ?>)</h2></div>
                <div class="card-body">
                    <div class="gallery-grid">
                    <?php foreach ($staticPhotos as $filename): ?>
                        <?php 
                        $val = "static:" . $filename; 
                        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        $isVideo = in_array($ext, ['mp4', 'webm', 'ogg', 'mov', 'avi']);
                        ?>
                        <div class="gallery-item">
                            <input type="checkbox" name="selected_photos[]" class="photo-checkbox select-checkbox" value="<?= htmlspecialchars($val) ?>">
                            <?php if ($isVideo): ?>
                                <video src="../images/gallery/<?= htmlspecialchars($filename) ?>" style="width: 100%; height: 100%; object-fit: cover; display: block;"></video>
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; background: rgba(0,0,0,0.6); padding: 8px 12px; border-radius: 50%; pointer-events: none; z-index: 5;">
                                    <i class="fas fa-play"></i>
                                </div>
                            <?php else: ?>
                                <img src="../images/gallery/<?= htmlspecialchars($filename) ?>" alt="" loading="lazy"
                                     onerror="this.parentElement.style.background='#fee'">
                            <?php endif; ?>
                            <span class="filename"><?= htmlspecialchars($filename) ?></span>
                            <button type="button" class="btn btn-sm btn-danger del-btn" onclick="deleteSinglePhoto('<?= htmlspecialchars($val) ?>')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </form>
    </div>
</div>

<script>
// ─── ДИПЛОМНЫЙ КОММЕНТАРИЙ: ИНТЕРАКТИВНОСТЬ И КЛИЕНТСКИЙ UX (ФРОНТЕНД) ───
// 
// 1. ДИНАМИЧЕСКИЙ ПОДСЧЕТ И СОСТОЯНИЯ DOM:
//    Функция updateCounter() производит подсчет активных чекбоксов без перезагрузки
//    страницы и динамически выводит их число в кнопку удаления, повышая эргономику.
// 
// 2. ИСКЛЮЧЕНИЕ ВЛОЖЕННЫХ ФОРМ (Спецификация HTML5):
//    Согласно стандартам консорциума W3C, теги <form> не могут быть вложены друг в друга.
//    Для реализации одиночного и пакетного удаления в рамках одной страницы, одиночные
//    кнопки вызывают JS-функцию deleteSinglePhoto(), которая программно отмечает
//    нужный чекбокс и отправляет единую форму, соблюдая валидность верстки.

const checkboxes = document.querySelectorAll('.photo-checkbox');
const selectedCountSpan = document.getElementById('selectedCount');
const selectAllBtn = document.getElementById('selectAllBtn');

// Обновление счетчика выбранных фото
function updateCounter() {
    const checked = document.querySelectorAll('.photo-checkbox:checked').length;
    selectedCountSpan.textContent = checked;
}

checkboxes.forEach(cb => {
    cb.addEventListener('change', updateCounter);
});

// Кнопка "Выбрать все" / "Снять выбор"
selectAllBtn.addEventListener('click', function() {
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
    checkboxes.forEach(cb => {
        cb.checked = !allChecked;
    });
    this.innerHTML = allChecked 
        ? '<i class="far fa-check-square"></i> Выбрать все' 
        : '<i class="fas fa-check-square"></i> Снять выбор';
    updateCounter();
});

// Удаление одной конкретной фотографии через JS-симуляцию
function deleteSinglePhoto(value) {
    if (confirm('Вы уверены, что хотите удалить эту фотографию с сервера?')) {
        // Снимаем выбор со всех
        checkboxes.forEach(cb => cb.checked = false);
        // Выбираем только целевую
        const target = document.querySelector(`.photo-checkbox[value="${value}"]`);
        if (target) {
            target.checked = true;
            document.getElementById('galleryForm').submit();
        }
    }
}

// Отправка формы пакетного удаления
function submitBulkDelete() {
    const checkedCount = document.querySelectorAll('.photo-checkbox:checked').length;
    if (checkedCount === 0) {
        alert('Выберите хотя бы одну фотографию для удаления.');
        return;
    }
    if (confirm(`Вы уверены, что хотите безвозвратно удалить выбранные фотографии (${checkedCount} шт.) с сервера?`)) {
        document.getElementById('galleryForm').submit();
    }
}
</script>
</body>
</html>
