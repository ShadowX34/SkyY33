<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Владимирский АСК ДОСААФ России - Прыжки с парашютом' ?></title>
    <?php if(isset($pageCss)): ?>
    <link rel="stylesheet" href="css/<?= htmlspecialchars($pageCss) ?>?v=13.0">
    <?php else: ?>
    <link rel="stylesheet" href="css/index.css?v=13.0">
    <?php endif; ?>
    <link rel="stylesheet" href="css/global.css?v=13.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Лого2.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="index.php"><img src="images/Лого2.png" class="logo" alt="Логотип"></a>
                <div class="company-name">Владимирский АСК ДОСААФ России<br><span style="font-size:0.9rem;">Прыжки с парашютом</span></div>
            </div>
            
            <div class="nav-container">
                <ul class="nav-menu">
                    <li class="nav-item dropdown">
                        <a href="about.php" class="nav-link">О нас <i class="fas fa-chevron-down drop-icon"></i></a>
                        <ul class="dropdown-child">
                            <li><a href="about.php">О клубе</a></li>
                            <li><a href="team.php">Команда</a></li>
                            <li><a href="reviews.php">Отзывы</a></li>
                            <li><a href="faq.php">Вопрос-ответ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="certificates.php" class="nav-link">Подарочные сертификаты</a></li>
                    <li class="nav-item"><a href="prices.php" class="nav-link">Цены</a></li>
                    <li class="nav-item"><a href="gallery.php" class="nav-link">Галерея</a></li>
                    <li class="nav-item"><a href="news.php" class="nav-link">Новости</a></li>
                    <li class="nav-item"><a href="stocks.php" class="nav-link">Акции</a></li>
                    <li class="nav-item"><a href="contacts.php" class="nav-link">Контакты</a></li>
                </ul>
                
                <div class="phone-container">
                    <i class="fas fa-phone-alt phone-icon"></i>
                    <a href="tel:89190234000" class="phone-link">8 919 023 40 00</a>
                </div>
               
                
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
