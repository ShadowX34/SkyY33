<?php
require 'auth.php';
require '../includes/db_connect.php';

$msg  = $_GET['msg'] ?? '';
$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
}
$rows = $pdo->query("SELECT * FROM news ORDER BY sort_order ASC, pub_date DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Новости — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-newspaper"></i> Новости</h1>
        <a href="news.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Новость</a>
    </div>
    <div class="content">
        <?php if ($msg): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i>
            <?= $msg==='saved'?'Новость сохранена':($msg==='deleted'?'Новость удалена':'OK') ?>
        </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header"><h2><?= $edit ? 'Редактировать новость' : 'Добавить новость' ?></h2></div>
            <div class="card-body">
                <form method="post" action="news_save.php" enctype="multipart/form-data">
                    <?php if ($edit): ?><input type="hidden" name="id" value="<?= $edit['id'] ?>"><?php endif; ?>
                    <div class="form-grid">
                        <div class="form-group span2">
                            <label>Заголовок *</label>
                            <input type="text" name="title" required value="<?= htmlspecialchars($edit['title'] ?? '') ?>">
                        </div>
                        <div class="form-group span2">
                            <label>Анонс</label>
                            <textarea name="excerpt" rows="3"><?= htmlspecialchars($edit['excerpt'] ?? '') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Тег (напр. АЭРОКЛУБ)</label>
                            <input type="text" name="tag" value="<?= htmlspecialchars($edit['tag'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Дата публикации *</label>
                            <input type="date" name="pub_date" required value="<?= $edit['pub_date'] ?? date('Y-m-d') ?>">
                        </div>
                        <div class="form-group">
                            <label>Изображение <?= $edit ? '(оставьте пустым чтобы не менять)' : '' ?></label>
                            <input type="file" name="image" accept="image/*" <?= $edit?'':'required' ?>>
                            <?php if ($edit && $edit['image']): ?>
                            <div style="margin-top:8px">
                                <img src="../images/<?= htmlspecialchars($edit['image']) ?>" class="thumb" style="width:80px;height:50px;object-fit:cover">
                                <span class="form-hint"><?= htmlspecialchars($edit['image']) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Порядок сортировки</label>
                            <input type="number" name="sort_order" value="<?= $edit['sort_order'] ?? 0 ?>">
                        </div>
                        <div class="form-group">
                            <label class="toggle-label">
                                <input type="checkbox" name="is_active" value="1" <?= ($edit['is_active'] ?? 1) ? 'checked' : '' ?>>
                                Активна
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:15px;display:flex;gap:10px">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Сохранить</button>
                        <?php if ($edit): ?><a href="news.php" class="btn btn-secondary">Отмена</a><?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h2>Все новости (<?= count($rows) ?>)</h2></div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead><tr><th>#</th><th>Фото</th><th>Заголовок</th><th>Тег</th><th>Дата</th><th>Статус</th><th>Действия</th></tr></thead>
                    <tbody>
                    <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?php if ($r['image']): ?><img src="../images/<?= htmlspecialchars($r['image']) ?>" class="thumb"><?php endif; ?></td>
                        <td><?= htmlspecialchars($r['title']) ?></td>
                        <td><?= htmlspecialchars($r['tag'] ?? '—') ?></td>
                        <td><?= date('d.m.Y', strtotime($r['pub_date'])) ?></td>
                        <td><span class="badge badge-<?= $r['is_active']?'success':'secondary' ?>"><?= $r['is_active']?'Активна':'Скрыта' ?></span></td>
                        <td class="actions">
                            <a href="news.php?edit=<?= $r['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form method="post" action="news_delete.php" onsubmit="return confirm('Удалить новость?')">
                                <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
