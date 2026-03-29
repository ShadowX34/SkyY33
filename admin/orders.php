<?php
require 'auth.php';
require '../db_connect.php';

// Обновление статуса
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['set_status'])) {
    $stmt = $pdo->prepare("UPDATE certificate_orders SET status=? WHERE id=?");
    $stmt->execute([trim($_POST['status']), (int)$_POST['id']]);
    header('Location: orders.php?msg=updated'); exit;
}

$msg = $_GET['msg'] ?? '';
$orders = $pdo->query("SELECT * FROM certificate_orders ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
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
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h2>Все заказы (<?= count($orders) ?>)</h2>
            </div>
            <div class="card-body" style="padding:0;overflow-x:auto">
                <table>
                    <thead>
                        <tr>
                            <th>#</th><th>Клиент</th><th>Контакты</th>
                            <th>Сертификат</th><th>Цена</th>
                            <th>Комментарий</th><th>Дата</th><th>Статус</th>
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
                            <span class="badge badge-<?= $cls ?>" style="margin-top:4px"><?= $s ?></span>
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
