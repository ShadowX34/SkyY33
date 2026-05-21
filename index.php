<?php
// Переменная для динамического подключения файла стилей главной страницы в шапке
$pageCss = 'index.css';
// Подключаем общую шапку сайта (header)
require_once 'includes/header.php';
// Подключаем скрипт соединения с базой данных (переменная $pdo будет доступна здесь)
require_once 'includes/db_connect.php';

// SQL-запрос: загружаем список активных акций (is_active=1), сортируем их по весу (sort_order) и ID, ограничиваем выборку 3 карточками
$stocks = $pdo->query("SELECT * FROM stocks WHERE is_active=1 ORDER BY sort_order ASC, id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);

// SQL-запрос: загружаем последние 4 активные новости, отсортированные по дате публикации
$news = $pdo->query("SELECT * FROM news WHERE is_active=1 ORDER BY pub_date DESC, id DESC LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);
?>



<?php 
// Подключаем скрипт расчета статуса летной годности на основе погоды
require_once 'includes/flight_status.php'; 
// Вызываем функцию и сохраняем результаты (баллы, цвета, текст) в массив $fs
$fs = getFlightStatus();
?>

    <!-- Блок 1 -->

    <section class="hero-section" style="position: relative;"> <!-- Added relative for widget pos -->
        <!-- Vanta.js 3D облака -->
        <div id="vanta-clouds"></div>
        
        <div class="hero-content">
            <h1 class="hero-title">МЕЧТАЕТЕ</h1>
            <h2 class="hero-subtitle">О НЕБЕ?</h2>
            <p class="hero-text">В нашем аэроклубе Вы можете сделать шаг навстречу своей мечте! Насладитесь свободой и незабываемым чувством полета при прыжке с парашютом или полетав на самолете!</p>
            <div class="hero-buttons">
                <a href="certificates.php" class="hero-btn btn-primary">ХОЧУ ПРЫГНУТЬ!</a>
                <!-- <a href="#" class="hero-btn btn-secondary">СНИМАЙ! КАЖЕТСЯ</a> -->
            </div>
        </div>

        <!-- Виджет летной годности (Smart Flight Status) -->
        <div class="flight-status-wrapper">
            <div class="fs-header">
                <h3 class="fs-title">ЛЕТНАЯ ГОДНОСТЬ</h3>
                <h4 class="fs-subtitle">МЕТЕО-ЦЕНТР СЕМЯЗИНО</h4>
            </div>

            <!-- Круговой индикатор -->
            <div class="gauge-container">
                <div class="gauge-background"></div>
                <div class="gauge-inner">
                    <div class="gauge-score"><span id="fs-counter">0</span><span class="gauge-percent">%</span></div>
                </div>
                <div class="gauge-needle" id="fs-needle" data-angle="<?= $fs['angle'] ?>"></div>
            </div>

            <!-- Данные о погоде -->
            <div class="fs-weather-stats">
                <div class="fs-stat">
                    <span class="fs-stat-val"><span id="fs-wind"><?= $fs['wind'] ?></span> <span style="font-size:0.6rem;">м/с</span></span>
                    <span class="fs-stat-label">Ветер</span>
                </div>
                <div class="fs-stat">
                    <span class="fs-stat-val"><span id="fs-clouds"><?= $fs['clouds'] ?></span> <span style="font-size:0.6rem;">%</span></span>
                    <span class="fs-stat-label">Облака</span>
                </div>
            </div>

            <!-- Вердикт 
                 Используем color и background inline для динамики -->
            <div id="fs-verdict-box" class="fs-verdict" style="color: <?= htmlspecialchars($fs['status_color']) ?>; background-color: <?= $fs['bg_color'] ?>;">
                "<?= htmlspecialchars($fs['verdict']) ?>"
            </div>
            
            <!-- Советы -->
            <div id="fs-tips-box" class="fs-tips" style="font-size: 0.85rem; color: #fff; margin-top: 10px; text-align: center; background: rgba(0,0,0,0.3); padding: 8px; border-radius: 8px; font-weight: 700;">
                <?= htmlspecialchars($fs['tips']) ?>
            </div>
            
            <div id="fs-status-desc" style="font-size: 0.75rem; color: rgba(255, 255, 255, 0.9); margin-top: 14px; text-align: center; font-weight: 700;">Статус: <?= htmlspecialchars($fs['desc']) ?></div>
        </div>
    </section>

    <!-- Подключаем 3D-библиотеку Three.js и плагин Vanta.js для отображения динамических анимированных облаков на фоне -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.24/dist/vanta.clouds.min.js"></script>
    <script>
    // Ждем полной загрузки страницы, прежде чем инициализировать 3D-эффект
    window.addEventListener('load', function() {
        // Инициализируем эффект "Clouds" (Облака) в блоке с ID #vanta-clouds
        const vantaEffect = VANTA.CLOUDS({
            el: '#vanta-clouds',
            mouseControls: true,       // Реагировать на движение мыши на десктопе
            touchControls: true,       // Реагировать на тач-события на смартфонах
            minHeight: 200.00,
            minWidth: 200.00,
            skyColor: 0x1a5eaa,        // Цвет неба (синий)
            cloudColor: 0x8bacc7,      // Цвет облаков (светло-голубой)
            cloudShadowColor: 0x4a6a82,// Цвет теней облаков (темно-серый)
            sunColor: 0xb07030,        // Цвет солнца
            sunGlareColor: 0xa06828,   // Блики солнца
            sunlightColor: 0xb0916a,   // Свет солнца
            speed: 1.2                 // Скорость движения облаков
        });

        // Принудительно пересчитываем размеры canvas-элемента через 100мс после инициализации,
        // чтобы 3D-графика правильно растянулась на весь экран мобильных устройств
        setTimeout(function() {
            if (vantaEffect && vantaEffect.resize) {
                vantaEffect.resize();
            }
        }, 100);
    });
    </script>

    <script>
        // Эффект скролла: меняем фон и тень шапки сайта, когда пользователь прокручивает страницу вниз
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                // Если прокрутили больше 20 пикселей - делаем шапку более контрастной и темной
                header.style.boxShadow = '0 6px 25px rgba(0, 0, 0, 0.2)';
                header.style.background = 'linear-gradient(135deg, var(--primary-dark) 0%, #15427e 100%)';
            } else {
                // Возвращаем исходный вид шапки в самом верху страницы
                header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.15)';
                header.style.background = 'linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%)';
            }
        });

        // Функция для обновления визуального виджета "Летная годность" новыми данными о погоде
        function updateFlightWidget(data) {
            const needle = document.getElementById('fs-needle');     // Стрелка прибора
            const counter = document.getElementById('fs-counter');   // Текстовый счетчик процентов
            const wind = document.getElementById('fs-wind');         // Поле скорости ветра
            const clouds = document.getElementById('fs-clouds');     // Поле облачности
            const verdictBox = document.getElementById('fs-verdict-box'); // Блок вердикта
            const tipsBox = document.getElementById('fs-tips-box');       // Блок советов
            const statusDesc = document.getElementById('fs-status-desc'); // Описание статуса

            if (!needle || !counter) return;

            const targetAngle = parseFloat(data.angle); // Целевой угол поворота стрелки
            const targetScore = parseInt(data.score);   // Целевое значение процентов (0-100)

            // Плавно поворачиваем стрелку в CSS с помощью CSS-свойства transform: rotate()
            needle.style.transform = `rotate(${targetAngle}deg)`;
            
            // Анимация плавного пересчета цифр процентов (от текущего значения до нового)
            let currentScore = parseInt(counter.innerText) || 0;
            const duration = 1000; // Длительность анимации 1 секунда (1000 мс)
            const interval = 20;   // Шаг обновления 20 мс
            const steps = duration / interval; // Количество шагов
            const increment = (targetScore - currentScore) / steps; // Шаг инкремента
            
            const timer = setInterval(() => {
                currentScore += increment;
                // Проверяем окончание анимации
                if ((increment > 0 && currentScore >= targetScore) || (increment < 0 && currentScore <= targetScore)) {
                    counter.innerText = targetScore;
                    clearInterval(timer);
                } else {
                    counter.innerText = Math.round(currentScore);
                }
            }, interval);

            // Обновляем текстовые значения параметров погоды на виджете
            if (wind) wind.innerText = data.wind;
            if (clouds) clouds.innerText = data.clouds;
            if (verdictBox) {
                verdictBox.innerHTML = `"${data.verdict}"`;
                verdictBox.style.color = data.status_color; // Динамически меняем цвет текста
                verdictBox.style.backgroundColor = data.bg_color; // Динамически меняем фон плашки
            }
            if (tipsBox) tipsBox.innerText = data.tips;
            if (statusDesc) statusDesc.innerText = "Статус: " + data.desc;
        }

        // Выполняем код после загрузки всей структуры HTML документа (DOM)
        document.addEventListener('DOMContentLoaded', () => {
            const needle = document.getElementById('fs-needle');
            if (needle) {
                // Берем изначальный угол стрелки, который мы уже вывели с сервера с помощью PHP
                const initialAngle = needle.getAttribute('data-angle');
                // Переводим угол поворота стрелки обратно в шкалу от 0 до 100 процентов
                const initialScore = Math.min(100, Math.max(0, Math.round(((parseFloat(initialAngle) + 90) / 180) * 100)));
                
                // Запускаем анимацию счетчика и стрелки через 500мс после загрузки для красивого визуального эффекта
                setTimeout(() => {
                    updateFlightWidget({
                        angle: initialAngle,
                        score: initialScore,
                        wind: document.getElementById('fs-wind').innerText,
                        clouds: document.getElementById('fs-clouds').innerText,
                        verdict: document.getElementById('fs-verdict-box').innerText.replace(/"/g, ''),
                        status_color: document.getElementById('fs-verdict-box').style.color,
                        bg_color: document.getElementById('fs-verdict-box').style.backgroundColor,
                        tips: document.getElementById('fs-tips-box').innerText,
                        desc: document.getElementById('fs-status-desc').innerText.replace('Статус: ', '')
                    });
                }, 500);
            }

            // Настройка регулярного AJAX-опроса: каждые 60 секунд отправляем запрос на сервер к файлу ajax_weather.php,
            // чтобы получить новые данные о погоде и обновить виджет без перезагрузки всей страницы
            setInterval(() => {
                fetch('ajax_weather.php')
                    .then(response => response.json()) // Парсим ответ сервера как JSON
                    .then(data => {
                        updateFlightWidget(data); // Обновляем виджет полученными данными погоды
                    })
                    .catch(err => console.error('Ошибка обновления погоды:', err));
            }, 60000); 
        });
    </script>

    <!-- Блок 2 -->

   <section class="services-section">
        <div class="section-header">
            <h2 class="sections-title">НАШИ УСЛУГИ</h2>
            <h3 class="sections-subtitle"></h3>
        </div>
        
        <div class="services-grid">
            <!-- Услуга 1 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б1.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Ознакомительный полёт</h3>
                    <div class="service-price">4 000 ₽</div>
                    <ul class="service-features">
                        <li>15-20 минут в воздухе с инструктором</li>
                        <li>Обзорная экскурсия по аэродрому</li>
                        <li>Возможность попробовать управление самолётом</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 2 -->
            <div class="service-card">
                <div class="service-image" style="background-image: url('images/б2.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Самостоятельный прыжок</h3>
                    <div class="service-price">8 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 800-900 метров</li>
                        <li>Полная предварительная подготовка</li>
                        <li>Круглый купол с управлением</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 3 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б3.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с инструктором</h3>
                    <div class="service-price">12 000 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>50 секунд свободного падения</li>
                        <li>Профессиональный инструктор</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 4 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б4.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с оператором и GoPro</h3>
                    <div class="service-price">16 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Профессиональная съёмка на GoPro</li>
                        <li>Видео и фото материалы</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 5 -->
            <div class="service-card">
                 <div class="service-image" style="background-image: url('images/б5.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме с фото-видеосъёмкой</h3>
                    <div class="service-price">18 000 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Профессиональная фото и видеосъёмка</li>
                        <li>Обработанные материалы на память</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
            
            <!-- Услуга 6 -->
            <div class="service-card">
                <div class="service-image" style="background-image: url('images/б6.webp');"></div>
                <div class="service-content">
                    <h3 class="service-title">Прыжок в тандеме со съёмкой на GoPro</h3>
                    <div class="service-price">17 500 ₽</div>
                    <ul class="service-features">
                        <li>Прыжок с высоты 4000 метров</li>
                        <li>Съёмка на камеру GoPro</li>
                        <li>Видео в Full HD качестве</li>
                    </ul>
                    <a href="certificates.php" class="service-btn">Подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Блок 3 -->
<section class="promo-section">

   <div class="promo-bg-image" style="background-image: url('images/фон1.png')"></div>
    
    <!-- Декоративные элементы -->
    <div class="promo-decor decor-1"></div>
    <div class="promo-decor decor-2"></div>
    
    <div class="section-header">
        <h2 class="section-title">АКЦИИ И СПЕЦПРЕДЛОЖЕНИЯ</h2>
        <h3 class="section-subtitle">ЭКОНОМЬТЕ НА ВПЕЧАТЛЕНИЯХ</h3>
    </div>
    
    <div class="promo-container">
        <div class="promo-row">
            <?php 
            // Цикл foreach перебирает все загруженные из базы данных акции ($stocks)
            foreach ($stocks as $s): 
            ?>
            <div class="promo-card">
                <!-- Если у акции задан тег (например, "-10%" или "Новинка"), выводим ярлычок -->
                <?php if ($s['tag']): ?><div class="promo-badge"><?= htmlspecialchars($s['tag']) ?></div><?php endif; ?>
                
                <?php
                // Определяем путь к изображению акции. Если в базе пусто, берем картинку по умолчанию
                $stImgUrl = $s['image'] ?: 'images/скидка.webp';
                // Если картинка указана и не содержит http или images/, приписываем префикс папки images/
                if ($s['image'] && !preg_match('/^(http|images\/)/i', $s['image'])) $stImgUrl = 'images/' . $s['image'];
                ?>
                
                <div class="promo-image" style="background-image: url('<?= htmlspecialchars($stImgUrl) ?>');"></div>
                <div class="promo-content">
                    <!-- Заголовок и описание акции с защитой от XSS через htmlspecialchars() -->
                    <h3 class="promo-title"><?= htmlspecialchars($s['title']) ?></h3>
                    <?php if ($s['description']): ?><p class="promo-text"><?= htmlspecialchars($s['description']) ?></p><?php endif; ?>
                    
                    <ul class="promo-features">
                        <?php 
                        // Поле detail_text хранит список преимуществ через точку с запятой.
                        // Разбиваем эту строку в массив по разделителю ";" с помощью функции explode()
                        $details = explode(';', $s['detail_text'] ?? '');
                        // Выводим каждый пункт списка в теге <li>
                        foreach ($details as $detail): 
                            if (trim($detail)):
                        ?>
                            <li><?= htmlspecialchars(trim($detail)) ?></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                    <!-- Ссылка на страницу подробного описания конкретной акции по её ID -->
                    <a href="stock_detail.php?id=<?= $s['id'] ?>" class="promo-btn"><?= htmlspecialchars($s['price_label'] ?: 'Подробнее') ?></a>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if (empty($stocks)): ?>
                <!-- Запасные статические карточки, если в БД пусто -->
                <div class="promo-card">
                    <div class="promo-badge">-10%</div>
                    <div class="promo-image" style="background-image: url('images/скидка.webp');"></div>
                    <div class="promo-content">
                        <h3 class="promo-title">ДЕНЬ РОЖДЕНИЯ - СКИДКА 10%</h3>
                        <p class="promo-text">Предъяви паспорт и получи скидку 10% в свой день рождения!</p>
                        <ul class="promo-features">
                            <li>Действует в течение 3 дней до и после дня рождения</li>
                            <li>Распространяется на все виды прыжков</li>
                        </ul>
                        <a href="stocks.php" class="promo-btn">Получить скидку</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Блок 4 О нас -->

 <section class="about-section">
        <!-- Декоративный элемент -->
        <div class="about-decor decor-1"></div>
        
        <div class="about-container">
            <div class="about-content">
                <h2 class="section-titles">О НАС</h2>
                <p class="about-text">
                    Владимирский аэроклуб был основан в <strong>1934 году</strong>. С тех пор он подготовил множество летчиков, парашютистов и механиков, среди которых более <strong>200 мастеров спорта СССР и России</strong>.
                </p>
                
                <p class="about-text">
                    В <strong>2010 году</strong> наш аэроклуб был реорганизован в Негосударственное образовательное учреждение «Владимирский аэроклуб РОСТО», а в <strong>2011 году</strong> переименован во «Владимирский авиационно-спортивный клуб ДОСААФ России».
                </p>
                
                <p class="about-text">
                    <strong>С тех пор мы активно развиваемся и помогаем Вам покорять небо!</strong>
                </p>
                
                <div class="about-highlights">
                    <div class="highlight-item">
                        <div class="highlight-number">85+</div>
                        <div class="highlight-text">Лет успешной работы в авиационной сфере</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">200+</div>
                        <div class="highlight-text">Мастеров спорта подготовлено</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">10 000+</div>
                        <div class="highlight-text">Прыжков с парашютом ежегодно</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-number">50+</div>
                        <div class="highlight-text">Профессиональных инструкторов</div>
                    </div>
                </div>
                
                <a href="about.php" class="about-btn">ПОДРОБНЕЕ О НАС</a>
            </div>
            
            <div class="about-images">
                <!-- Основное изображение -->
                <img src="images/АН-2_1.jpg" alt="Владимирский аэроклуб" class="main-image">
                
                <!-- Дополнительное изображение -->
                <img src="images/АН-2.jpg" alt="История аэроклуба" class="secondary-image image-1">
            </div>
        </div>
    </section>

    <!-- Блок 5 Новости -->

  <section class="news-section">
        <!-- Декоративные элементы -->
        <div class="news-decor decor-1"></div>
        
        <div class="section-header">
            <h2 class="section-tit">НОВОСТИ КЛУБА</h2>
        </div>
        
        <div class="news-grid">
            <?php 
            // Цикл foreach перебирает все загруженные из базы данных новости ($news)
            foreach ($news as $n): 
            ?>
            <a href="news_detail.php?id=<?= $n['id'] ?>" class="news-card">
                <?php
                // Формируем путь к картинке новости (если нет в БД, берем заглушку)
                $newsImgUrl = $n['image'] ?: 'images/News.jpg';
                if ($n['image'] && !preg_match('/^(http|images\/)/i', $n['image'])) $newsImgUrl = 'images/' . $n['image'];
                ?>
                <div class="news-image" style="background-image: url('<?= htmlspecialchars($newsImgUrl) ?>');">
                    <div class="news-content">
                        <?php
                            // Ассоциативный массив для вывода месяцев на русском языке
                            $months = [
                                1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
                                5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
                                9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
                            ];
                            // Преобразуем строку даты из БД (например, 2026-05-21) в Unix Timestamp (секунды)
                            $timestamp = strtotime($n['pub_date']);
                            // Форматируем дату: день (j), название месяца из массива, и год (Y)
                            $ru_date = date('j', $timestamp) . ' ' . $months[(int)date('n', $timestamp)] . ' ' . date('Y', $timestamp);
                        ?>
                        <div class="news-date"><?= $ru_date ?></div>
                        
                        <!-- Выводим заголовок новости, обрезая его до 80 символов через mb_strimwidth с добавлением троеточия, чтобы верстка не ехала -->
                        <h3 class="news-title"><?= htmlspecialchars(mb_strimwidth($n['title'], 0, 80, "...")) ?></h3>
                        
                        <!-- То же самое делаем с кратким анонсом (обрезка до 150 символов) -->
                        <?php if ($n['excerpt']): ?><p class="news-excerpt"><?= htmlspecialchars(mb_strimwidth($n['excerpt'], 0, 150, "...")) ?></p><?php endif; ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>

            <?php if (empty($news)): ?>
                <p style="color: white; text-align: center; grid-column: 1/-1;">Новости скоро появятся!</p>
            <?php endif; ?>
        </div>
        
        <a href="news.php" class="all-news-btn">БОЛЬШЕ НОВОСТЕЙ</a>
    </section>

    <!-- Подвал -->

    
<?php require_once 'includes/footer.php'; ?>
