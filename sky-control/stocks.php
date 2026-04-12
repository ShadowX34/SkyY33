<?php
require 'auth.php';
require '../includes/db_connect.php';

$msg  = $_GET['msg'] ?? '';
$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM stocks WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
}
$rows = $pdo->query("SELECT * FROM stocks ORDER BY sort_order ASC, id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Акции — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-tag"></i> Акции</h1>
        <a href="stocks.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Новая акция</a>
    </div>
    <div class="content">
        <?php if ($msg): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i>
            <?= $msg==='saved'?'Акция сохранена':($msg==='deleted'?'Акция удалена':'OK') ?>
        </div>
        <?php endif; ?>

        <!-- Форма добавления/редактирования -->
        <div class="card">
            <div class="card-header"><h2><?= $edit ? 'Редактировать акцию' : 'Добавить акцию' ?></h2></div>
            <div class="card-body">
                <form method="post" action="stocks_save.php">
                    <?php if ($edit): ?><input type="hidden" name="id" value="<?= $edit['id'] ?>"><?php endif; ?>
                    <div class="form-grid">
                        <div class="form-group span2">
                            <label>Заголовок *</label>
                            <input type="text" name="title" required value="<?= htmlspecialchars($edit['title'] ?? '') ?>">
                        </div>
                        <div class="form-group span2">
                            <label>Описание</label>
                            <textarea name="description"><?= htmlspecialchars($edit['description'] ?? '') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Тег (напр. SALE!!!)</label>
                            <input type="text" name="tag" value="<?= htmlspecialchars($edit['tag'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Цена/скидка (напр. -500 ₽)</label>
                            <input type="text" name="price_label" value="<?= htmlspecialchars($edit['price_label'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Детали (напр. 8 БУДНИХ ДНЕЙ)</label>
                            <input type="text" name="detail_text" value="<?= htmlspecialchars($edit['detail_text'] ?? '') ?>">
                        </div>
                        <div class="form-group span2">
                            <label>Изображение (путь, напр. images/скидка.webp или URL)</label>
                            <input type="text" name="image" value="<?= htmlspecialchars($edit['image'] ?? '') ?>" placeholder="images/скидка.webp" style="width:100%">
                        </div>
                        <div class="form-group">
                            <label>Порядок сортировки</label>
                            <input type="number" name="sort_order" value="<?= $edit['sort_order'] ?? 0 ?>">
                        </div>
                        <div class="form-group">
                            <label class="toggle-label">
                                <input type="checkbox" name="is_active" value="1" <?= ($edit['is_active'] ?? 1) ? 'checked' : '' ?>>
                                Активна (показывать на сайте)
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:15px;display:flex;gap:10px">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Сохранить</button>
                        <?php if ($edit): ?><a href="stocks.php" class="btn btn-secondary">Отмена</a><?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Список акций -->
        <div class="card">
            <div class="card-header"><h2>Все акции (<?= count($rows) ?>)</h2></div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead><tr><th>#</th><th>Фото</th><th>Заголовок</th><th>Тег</th><th>Статус</th><th>Действия</th></tr></thead>
                    <tbody>
                    <?php foreach ($rows as $r): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><?php if ($r['image']): 
                                $thumb = preg_match('/^(http|images\/)/i', $r['image']) ? '../' . $r['image'] : '../images/' . $r['image'];
                                if (strpos($r['image'], 'http') === 0) $thumb = $r['image'];
                            ?><img src="<?= htmlspecialchars($thumb) ?>" class="thumb" style="width:80px;height:50px;object-fit:cover"><?php endif; ?></td>
                        <td><?= htmlspecialchars($r['title']) ?><br>
                            <?php if ($r['price_label']): ?><small style="color:#888"><?= htmlspecialchars($r['price_label']) ?></small><?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($r['tag'] ?? '—') ?></td>
                        <td><span class="badge badge-<?= $r['is_active']?'success':'secondary' ?>"><?= $r['is_active']?'Активна':'Скрыта' ?></span></td>
                        <td class="actions">
                            <a href="stocks.php?edit=<?= $r['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form method="post" action="stocks_delete.php" onsubmit="return confirm('Удалить акцию?')">
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
