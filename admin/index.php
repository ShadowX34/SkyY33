<?php
require 'auth.php';
require '../db_connect.php';

$orders  = $pdo->query("SELECT COUNT(*) FROM certificate_orders")->fetchColumn();
$newOrders = $pdo->query("SELECT COUNT(*) FROM certificate_orders WHERE status='Новый'")->fetchColumn();
$news    = $pdo->query("SELECT COUNT(*) FROM news WHERE is_active=1")->fetchColumn();
$stocks  = $pdo->query("SELECT COUNT(*) FROM stocks WHERE is_active=1")->fetchColumn();
$reviews = $pdo->query("SELECT COUNT(*) FROM reviews WHERE is_active=1")->fetchColumn();
$gallery = $pdo->query("SELECT COUNT(*) FROM gallery_photos")->fetchColumn();

$recentOrders = $pdo->query("SELECT * FROM certificate_orders ORDER BY order_date DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Дашборд — Админ-панель</title>
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'sidebar.php'; ?>
<div class="main">
    <div class="topbar">
        <h1><i class="fas fa-tachometer-alt"></i> Дашборд</h1>
        <div class="topbar-right">
            <i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['admin_user']) ?>
        </div>
    </div>
    <div class="content">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-shopping-cart"></i></div>
                <div class="stat-info"><h3><?= $orders ?></h3><p>Всего заказов</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon red"><i class="fas fa-bell"></i></div>
                <div class="stat-info"><h3><?= $newOrders ?></h3><p>Новых заказов</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-newspaper"></i></div>
                <div class="stat-info"><h3><?= $news ?></h3><p>Новостей</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon yellow"><i class="fas fa-tag"></i></div>
                <div class="stat-info"><h3><?= $stocks ?></h3><p>Акций</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon green"><i class="fas fa-star"></i></div>
                <div class="stat-info"><h3><?= $reviews ?></h3><p>Отзывов</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue"><i class="fas fa-images"></i></div>
                <div class="stat-info"><h3>328+<?= $gallery ?></h3><p>Фото в галерее</p></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2><i class="fas fa-clock"></i> Последние заказы</h2>
                <a href="orders.php" class="btn btn-sm btn-outline-primary">Все заказы</a>
            </div>
            <div class="card-body" style="padding:0">
                <table>
                    <thead><tr><th>#</th><th>Клиент</th><th>Сертификат</th><th>Дата</th><th>Статус</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentOrders as $o): ?>
                    <tr>
                        <td><?= $o['id'] ?></td>
                        <td><?= htmlspecialchars($o['full_name']) ?><br><small style="color:#888"><?= htmlspecialchars($o['phone']) ?></small></td>
                        <td><?= htmlspecialchars($o['certificate_name']) ?></td>
                        <td><?= date('d.m.Y', strtotime($o['order_date'])) ?></td>
                        <td><?php
                            $s = $o['status'] ?? 'Новый';
                            $cls = match($s) { 'Новый'=>'warning','Обработан'=>'success','Отменён'=>'danger', default=>'secondary' };
                            echo "<span class='badge badge-$cls'>$s</span>";
                        ?></td>
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
