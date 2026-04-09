<?php
require 'auth.php';
require '../includes/db_connect.php';

$msg  = $_GET['msg'] ?? '';
$edit = null;
if (isset($_GET['edit'])) {
    $stmt = $pdo->prepare("SELECT * FROM reviews WHERE id=?");
    $stmt->execute([(int)$_GET['edit']]);
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
}
$sliders    = $pdo->query("SELECT * FROM reviews WHERE type='slider' ORDER BY sort_order ASC")->fetchAll(PDO::FETCH_ASSOC);
$gratitudes = $pdo->query("SELECT * FROM reviews WHERE type='gratitude' ORDER BY sort_order ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Отзывы — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-star"></i> Отзывы</h1>
        <a href="reviews.php" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Добавить</a>
    </div>
    <div class="content">
        <?php if ($msg): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i>
            <?= $msg==='saved'?'Отзыв сохранён':($msg==='deleted'?'Отзыв удалён':'OK') ?>
        </div>
        <?php endif; ?>

        <!-- Форма -->
        <div class="card">
            <div class="card-header"><h2><?= $edit ? 'Редактировать' : 'Добавить отзыв' ?></h2></div>
            <div class="card-body">
                <form method="post" action="reviews_save.php" enctype="multipart/form-data">
                    <?php if ($edit): ?><input type="hidden" name="id" value="<?= $edit['id'] ?>"><?php endif; ?>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Тип</label>
                            <select name="type">
                                <option value="slider" <?= ($edit['type'] ?? 'slider')==='slider'?'selected':'' ?>>Слайдер (скриншот отзыва)</option>
                                <option value="gratitude" <?= ($edit['type'] ?? '')==='gratitude'?'selected':'' ?>>Благодарность (официальное письмо)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Изображение <?= $edit ? '(оставьте пустым чтобы не менять)' : '' ?></label>
                            <input type="file" name="image" accept="image/*" <?= $edit?'':'required' ?>>
                            <?php if ($edit && $edit['image']): ?>
                            <div style="margin-top:6px">
                                <img src="../images/reviews/<?= htmlspecialchars($edit['image']) ?>" class="thumb">
                                <span class="form-hint"><?= htmlspecialchars($edit['image']) ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group span2">
                            <label>Имя автора <small style="color:#888">(появится над текстом отзыва)</small></label>
                            <input type="text" name="author_name" value="<?= htmlspecialchars($edit['author_name'] ?? '') ?>" placeholder="Например: Иван Иванов">
                        </div>
                        <div class="form-group span2" id="textField">
                            <label>Текст отзыва <small style="color:#888">(для слайдера)</small></label>
                            <textarea name="review_text" rows="3"><?= htmlspecialchars($edit['review_text'] ?? '') ?></textarea>
                        </div>
                        <div class="form-group span2" id="captionField">
                            <label>Подпись <small style="color:#888">(для благодарности)</small></label>
                            <textarea name="caption" rows="3"><?= htmlspecialchars($edit['caption'] ?? '') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Порядок сортировки</label>
                            <input type="number" name="sort_order" value="<?= $edit['sort_order'] ?? 0 ?>">
                        </div>
                        <div class="form-group">
                            <label class="toggle-label">
                                <input type="checkbox" name="is_active" value="1" <?= ($edit['is_active'] ?? 1) ? 'checked' : '' ?>>
                                Активен
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:15px;display:flex;gap:10px">
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Сохранить</button>
                        <?php if ($edit): ?><a href="reviews.php" class="btn btn-secondary">Отмена</a><?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- Слайдер -->
        <div class="card">
            <div class="card-header"><h2><i class="fas fa-images"></i> Слайдер отзывов (<?= count($sliders) ?>)</h2></div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead><tr><th>#</th><th>Фото</th><th>Автор</th><th>Текст</th><th>Порядок</th><th>Статус</th><th>Действия</th></tr></thead>
                    <tbody>
                    <?php foreach ($sliders as $r): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><img src="../images/reviews/<?= htmlspecialchars($r['image']) ?>" class="thumb" onerror="this.src='../images/Лого2.png'"></td>
                        <td><strong><?= htmlspecialchars($r['author_name'] ?: '—') ?></strong></td>
                        <td style="max-width:300px;white-space:normal;font-size:0.82rem"><?= htmlspecialchars(mb_substr($r['review_text'] ?? '', 0, 100)) ?>...</td>
                        <td><?= $r['sort_order'] ?></td>
                        <td><span class="badge badge-<?= $r['is_active']?'success':'secondary' ?>"><?= $r['is_active']?'Активен':'Скрыт' ?></span></td>
                        <td class="actions">
                            <a href="reviews.php?edit=<?= $r['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form method="post" action="reviews_delete.php" onsubmit="return confirm('Удалить?')">
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

        <!-- Благодарности -->
        <div class="card">
            <div class="card-header"><h2><i class="fas fa-award"></i> Благодарности (<?= count($gratitudes) ?>)</h2></div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead><tr><th>#</th><th>Фото</th><th>Подпись</th><th>Порядок</th><th>Статус</th><th>Действия</th></tr></thead>
                    <tbody>
                    <?php foreach ($gratitudes as $r): ?>
                    <tr>
                        <td><?= $r['id'] ?></td>
                        <td><img src="../images/reviews/<?= htmlspecialchars($r['image']) ?>" class="thumb" onerror="this.src='../images/Лого2.png'"></td>
                        <td style="max-width:300px;white-space:normal;font-size:0.82rem"><?= htmlspecialchars(mb_substr($r['caption'] ?? '', 0, 100)) ?>...</td>
                        <td><?= $r['sort_order'] ?></td>
                        <td><span class="badge badge-<?= $r['is_active']?'success':'secondary' ?>"><?= $r['is_active']?'Активен':'Скрыт' ?></span></td>
                        <td class="actions">
                            <a href="reviews.php?edit=<?= $r['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form method="post" action="reviews_delete.php" onsubmit="return confirm('Удалить?')">
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
