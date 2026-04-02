<?php
require 'auth.php';
require '../includes/db_connect.php';

$msg = $_GET['msg'] ?? '';
$uploaded = $pdo->query("SELECT * FROM gallery_photos ORDER BY uploaded_at DESC")->fetchAll(PDO::FETCH_ASSOC);
$staticCount = count(glob('../images/gallery/*.jpg') ?: []);
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
.gallery-item { position: relative; border-radius: 8px; overflow: hidden; background: #f0f0f0; aspect-ratio: 1; }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; }
.gallery-item .del-btn { position: absolute; top: 6px; right: 6px; }
.gallery-item .filename { position: absolute; bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.55); color: white; font-size: 0.7rem; padding: 4px 6px; }
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
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Фото загружено</div>
        <?php elseif ($msg === 'deleted'): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Фото удалено</div>
        <?php elseif ($msg === 'error'): ?>
        <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> Ошибка загрузки</div>
        <?php endif; ?>

        <div class="stats-grid" style="grid-template-columns:repeat(3,1fr);max-width:500px">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-photo-video"></i></div>
                <div class="stat-info"><h3><?= $staticCount ?></h3><p>Статичных фото</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-upload"></i></div>
                <div class="stat-info"><h3><?= count($uploaded) ?></h3><p>Загружено через админку</p></div>
            </div>
        </div>

        <!-- Форма загрузки -->
        <div class="card">
            <div class="card-header"><h2>Загрузить фото</h2></div>
            <div class="card-body">
                <form method="post" action="gallery_upload.php" enctype="multipart/form-data" style="display:flex;gap:10px;align-items:flex-end;flex-wrap:wrap">
                    <div class="form-group" style="flex:1;min-width:250px">
                        <label>Выберите изображения (jpg, jpeg, png, webp)</label>
                        <input type="file" name="images[]" accept="image/*" multiple required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> Загрузить</button>
                </form>
            </div>
        </div>

        <!-- Загруженные через админку -->
        <?php if ($uploaded): ?>
        <div class="card">
            <div class="card-header"><h2>Загружено через админку (<?= count($uploaded) ?>)</h2></div>
            <div class="card-body">
                <div class="gallery-grid">
                <?php foreach ($uploaded as $p): ?>
                    <div class="gallery-item">
                        <img src="../images/gallery/<?= htmlspecialchars($p['filename']) ?>" alt="" loading="lazy"
                             onerror="this.parentElement.style.background='#fee'">
                        <span class="filename"><?= htmlspecialchars($p['filename']) ?></span>
                        <form method="post" action="gallery_delete.php" onsubmit="return confirm('Удалить фото?')" style="display:inline">
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <input type="hidden" name="filename" value="<?= htmlspecialchars($p['filename']) ?>">
                            <button class="btn btn-sm btn-danger del-btn"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-info"><i class="fas fa-info-circle"></i> Загруженных через админку фото пока нет. Используйте форму выше.</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
