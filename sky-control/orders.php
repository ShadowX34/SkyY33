<?php
require 'auth.php';
require '../includes/db_connect.php';

// Обновление статуса
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['set_status'])) {
    $stmt = $pdo->prepare("UPDATE certificate_orders SET status=? WHERE id=?");
    $stmt->execute([trim($_POST['status']), (int)$_POST['id']]);
    header('Location: orders.php?msg=updated'); exit;
}

// Удаление одной записи
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM certificate_orders WHERE id=?");
    $stmt->execute([(int)$_POST['delete_id']]);
    header('Location: orders.php?msg=deleted'); exit;
}

// Удаление всех обработанных
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_processed'])) {
    $pdo->exec("DELETE FROM certificate_orders WHERE status='Обработан'");
    header('Location: orders.php?msg=deleted_processed'); exit;
}

$msg = $_GET['msg'] ?? '';
$orders = $pdo->query("SELECT * FROM certificate_orders ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Заказы — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-shopping-cart"></i> Заказы сертификатов</h1>
    </div>
    <div class="content">
        <?php if ($msg === 'updated'): ?>
        <div class="alert alert-success"><i class="fas fa-check-circle"></i> Статус обновлён</div>
        <?php elseif ($msg === 'deleted'): ?>
        <div class="alert alert-success"><i class="fas fa-trash-alt"></i> Запись удалена</div>
        <?php elseif ($msg === 'deleted_processed'): ?>
        <div class="alert alert-success"><i class="fas fa-trash-alt"></i> Все обработанные заказы удалены</div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header" style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;">
                <h2>Все заказы (<?= count($orders) ?>)</h2>
                
                <div style="display:flex; gap: 10px; align-items:center; flex-grow:1; justify-content: flex-end; margin-right: 20px;">
                    <select id="filterColumn" style="padding: 8px; border-radius: 6px; border: 1px solid #ddd; outline: none;">
                        <option value="0">Все колонки</option>
                        <option value="1">Клиент</option>
                        <option value="2">Контакты</option>
                        <option value="3">Сертификат</option>
                        <option value="4">Цена</option>
                        <option value="5">Комментарий</option>
                        <option value="6">Дата</option>
                        <option value="7">Статус</option>
                    </select>
                    <input type="text" id="filterInput" placeholder="Поиск..." style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; width: 250px;">
                </div>

                <?php if (count($orders) > 0): ?>
                <form method="post" onsubmit="return confirm('Удалить все обработанные заказы?')" style="margin-left: auto;">
                    <button name="delete_processed" class="btn btn-sm btn-danger" style="background:#dc3545;color:#fff;border:none;padding:7px 14px;border-radius:6px;cursor:pointer;">
                        <i class="fas fa-broom"></i> Очистить обработанные
                    </button>
                </form>
                <?php endif; ?>
            </div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>#</th><th>Клиент</th><th>Контакты</th>
                            <th>Сертификат</th><th>Цена</th>
                            <th>Комментарий</th><th>Дата</th><th>Статус</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $o): ?>
                    <?php
                        $s = $o['status'] ?? 'Новый';
                        $cls = 'secondary';
                        switch($s) {
                            case 'Новый': $cls = 'warning'; break;
                            case 'Обработан': $cls = 'success'; break;
                            case 'Отменён': $cls = 'danger'; break;
                        }
                    ?>
                    <tr>
                        <td><?= $o['id'] ?></td>
                        <td><?= htmlspecialchars($o['full_name']) ?></td>
                        <td>
                            <a href="tel:<?= htmlspecialchars($o['phone']) ?>"><?= htmlspecialchars($o['phone']) ?></a><br>
                            <a href="mailto:<?= htmlspecialchars($o['email']) ?>" style="font-size:0.8rem"><?= htmlspecialchars($o['email']) ?></a>
                        </td>
                        <td><?= htmlspecialchars($o['certificate_name']) ?></td>
                        <td><?= number_format($o['certificate_price'], 0, ',', ' ') ?> ₽</td>
                        <td style="max-width:180px;white-space:normal"><?= htmlspecialchars($o['comment'] ?? '') ?></td>
                        <td><?= date('d.m.Y H:i', strtotime($o['created_at'])) ?></td>
                        <td>
                            <form method="post" style="display:flex;gap:5px;align-items:center">
                                <input type="hidden" name="id" value="<?= $o['id'] ?>">
                                <select name="status" class="status-select">
                                    <?php foreach (['Новый','Обработан','Отменён'] as $st): ?>
                                    <option <?= $s===$st?'selected':'' ?>><?= $st ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button name="set_status" class="btn btn-sm btn-primary">✓</button>
                            </form>

                        </td>
                        <td>
                            <form method="post" onsubmit="return confirm('Удалить заказ #<?= $o['id'] ?>?')">
                                <input type="hidden" name="delete_id" value="<?= $o['id'] ?>">
                                <button type="submit" title="Удалить" style="background:#dc3545;color:#fff;border:none;padding:6px 10px;border-radius:6px;cursor:pointer;font-size:0.9rem;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterInput = document.getElementById('filterInput');
    const filterColumn = document.getElementById('filterColumn');
    const rows = document.querySelectorAll('table tbody tr');

    function applyFilter() {
        let filter = filterInput.value.toLowerCase();
        let colIndex = parseInt(filterColumn.value);

        rows.forEach(row => {
            let text = '';
            if (colIndex === 0) {
                text = row.innerText.toLowerCase();
                let select = row.querySelector('select[name="status"]');
                if (select) text += ' ' + select.value.toLowerCase();
            } else {
                let cell = row.children[colIndex];
                if (colIndex === 7) {
                    let s = cell.querySelector('select[name="status"]');
                    if (s) text = s.value.toLowerCase();
                } else {
                    text = cell.innerText.toLowerCase();
                }
            }
            
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    }

    filterInput.addEventListener('input', applyFilter);
    filterColumn.addEventListener('change', () => {
        filterInput.focus();
        applyFilter();
    });
});
</script>
</body>
</html>
