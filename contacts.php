<?php
$pageCss = 'contacts.css';
require_once 'includes/header.php';
?>



<!-- Основной контент страницы -->
<main class="contacts-page">
    <h1 class="page-title">КОНТАКТЫ</h1>

    <div class="contacts-container">
        <div class="contacts-info">
            <div class="contacts-section">
                <h2>Свяжитесь с нами</h2>
                <div class="contact-item">
                    <i class="fas fa-phone-alt contact-icon"></i>
                    <div class="contact-text">
                        <strong>Телефон:</strong> <a href="tel:89190234000">8 919 023 40 00</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fab fa-viber contact-icon"></i>
                    <div class="contact-text">
                        <strong>Viber, WhatsApp:</strong> <a href="https://wa.me/79190234000">8 919 023 40 00</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope contact-icon"></i>
                    <div class="contact-text">
                        <strong>Email:</strong> <a href="mailto:vlad-skyclub@yandex.ru">vlad-skyclub@yandex.ru</a>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt contact-icon"></i>
                    <div class="contact-text">
                        <strong>Фактический адрес:</strong> Владимирская область, Суздальский район, пос. Сокол
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marked-alt contact-icon"></i>
                    <div class="contact-text">
                        <strong>Координаты:</strong> 56.251039, 40.582682
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="contacts-section">
                <h2>Как добраться</h2>
                <div class="contact-text">
                    <p>Мы находимся недалеко от старинного русского города Владимир. От Москвы всего в 190 км (2,5 часах
                        езды на машине).</p>
                    <p>Выезжаем из города Владимир в сторону Н. Новгорода и движемся прямо 8 км, до поворота на с.
                        Добрынское, проезжая п. Боголюбово и мост через р. Нерль, поворачиваем налево, после чего ещё
                        5км до въезда на аэродром (остановка "Аэропорт").</p>
                    <p>После въезда на территорию аэродрома поворачиваем направо и едем прямо до упора.</p>
                    <p>Если прибываете на общественном транспорте, от вокзала к нам ходит автобус №102. Доезжаем до
                        остановки "Аэропорт", заходим в ворота и идём направо 650м.</p>
                    <p>После парашютных прыжков можно очень хорошо отдохнуть. Желающие могут прокатиться в город-музей
                        Суздаль.</p>
                </div>
            </div>

            <div class="divider"></div>

            <div class="contacts-section">
                <h2>Реквизиты</h2>
                <div class="contact-text">
                    <p><strong>НОУ "Владимирский АСК ДОСААФ РОССИИ"</strong></p>
                    <p>ИНН 3327317812</p>
                    <p>ОГРН 1033301809265</p>
                    <p><strong>Юридический адрес:</strong> 600022, г. Владимир, территория Аэропорта (Семязино), стр. 4
                    </p>
                </div>
            </div>
        </div>


        <div class="contacts-container">
            <div class="contacts-info">
                <div class="contacts-section">
                    <h2>Режим работы</h2>
                    <div class="contact-schedule">
                        <div class="schedule-day">
                            <span class="day-name">Четверг:</span>
                            <span class="day-activity">Прыжок с инструктором в тандеме<br>Ознакомительный полет на
                                самолете</span>
                        </div>
                        <div class="schedule-day">
                            <span class="day-name">Суббота - Воскресенье:</span>
                            <span class="day-activity">Самостоятельный прыжок на круглом куполе<br>Прыжок с инструктором
                                в тандеме<br>Ознакомительный полет на самолете</span>
                        </div>
                        <div class="schedule-day">
                            <span class="day-name">Пн., Вт., Ср., Пт.:</span>
                            <span class="day-activity">Выходной</span>
                        </div>
                    </div>
                </div>

                <div class="divider"></div>

                <div class="contacts-section">
                    <h2>Политика конфиденциальности</h2>
                    <div class="contact-text">
                        <a href="privacy.php" style="color: var(--primary); text-decoration: underline;">Актуальная версия политики конфиденциальности</a>
                    </div>
                </div>
            </div>
        </div>
</main>

<!-- Подвал -->


<?php require_once 'includes/footer.php'; ?>