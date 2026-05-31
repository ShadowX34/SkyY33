<?php
$pageCss = 'certificates.css';
require_once 'includes/header.php';
require_once 'includes/db_connect.php';

// Инициализируем резервный массив сертификатов по умолчанию (если в БД пусто)
$certificates = [
    [
        'service_name' => 'ОЗНАКОМИТЕЛЬНЫЙ ПОЛЕТ',
        'price' => 4000,
        'description' => 'Никак не можешь решиться на прыжок с парашютом, а адреналина всё равно хочется? Тогда полёт на самолете - идеальный вариант для первого знакомства с небом!',
        'image' => 'images/б1.webp'
    ],
    [
        'service_name' => 'ПРЫЖОК В ТАНДЕМЕ С ИНСТРУКТОРОМ',
        'price' => 12000,
        'description' => 'Прыжок в тандеме с инструктором - это отличный способ познакомиться с небом, ощутить весь спектр эмоций от свободного падения и мягкого приземления под куполом парашюта.',
        'image' => 'images/б2.webp'
    ],
    [
        'service_name' => 'САМОСТОЯТЕЛЬНЫЙ ПРЫЖОК',
        'price' => 8500,
        'description' => 'Самостоятельный прыжок с парашютом - это отличный способ осуществить свою мечту, прикоснуться к небу и почувствовать себя настоящим парашютистом.',
        'image' => 'images/б3.webp'
    ],
    [
        'service_name' => 'ПРЫЖОК В ТАНДЕМЕ С ФОТО-ВИДЕОСЪЁМКОЙ',
        'price' => 18000,
        'description' => 'Запечатлейте свой прыжок на память! Профессиональная фото и видео съемка позволят вам переживать эти незабываемые моменты снова и снова.',
        'image' => 'images/б4.webp'
    ],
    [
        'service_name' => 'ПРЫЖОК В ТАНДЕМЕ С ОПЕРАТОРОМ И GOPRO',
        'price' => 16500,
        'description' => 'Экстремальная съемка вашего прыжка на камеру GoPro с разных ракурсов. Вы получите динамичное видео в высоком качестве, которым сможете поделиться с друзьями.',
        'image' => 'images/б5.webp'
    ],
    [
        'service_name' => 'ПРЫЖОК В ТАНДЕМЕ С СЪЁМКОЙ НА GOPRO',
        'price' => 17500,
        'description' => 'Давно мечтаете покорить воздушную стихию? Но никак не можете решиться на отчаянный шаг в «пропасть». Прыжок с оператором - это безопасно и незабываемо!',
        'image' => 'images/б6.webp'
    ]
];

try {
    // Пробуем получить актуальные сертификаты из БД
    $stmt = $pdo->query("SELECT * FROM prices WHERE category='certificates' AND is_active=1 ORDER BY sort_order ASC, id ASC");
    $dbCertificates = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($dbCertificates)) {
        $certificates = $dbCertificates;
    }
} catch (PDOException $e) {
    // В случае ошибки (например, если таблицы нет) используем статические резервные данные
}
?>

    <!-- Подарочные сертификаты -->

   <!-- Основной контент страницы -->
    <main class="certificates-page">
        <h1 class="page-title">ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h1>
        <p class="page-description">
            Подарите незабываемые эмоции и яркие впечатления своим близким! Наши сертификаты - это идеальный подарок для тех, кто любит экстрим и новые ощущения.
        </p>
        
        <div class="certificates-grid">
            <?php foreach ($certificates as $c): ?>
            <div class="certificate-card">
                <?php 
                $imgUrl = $c['image'] ?: 'images/б1.webp';
                // Если картинка указана и не содержит http или images/, приписываем префикс
                if ($c['image'] && !preg_match('/^(http|images\/)/i', $c['image'])) $imgUrl = 'images/' . $c['image'];
                ?>
                <div class="certificate-image" style="background-image: url('<?= htmlspecialchars($imgUrl) ?>');">
                    <div class="certificate-price"><?= number_format($c['price'], 0, '.', ' ') ?>₽</div>
                </div>
                <div class="certificate-content">
                    <h2 class="certificate-title"><?= htmlspecialchars($c['service_name']) ?></h2>
                    <p class="certificate-description">
                        <?= htmlspecialchars($c['description'] ?? '') ?>
                    </p>
                    <button class="certificate-btn order-btn" 
                            data-certificate="<?= htmlspecialchars($c['service_name']) ?>" 
                            data-price="<?= number_format($c['price'], 0, '.', '') ?>">Заказать</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Дополнительная информация -->
        <div class="info-section">
            <h2 class="info-title">Как это работает?</h2>
            <p class="info-text">
                Выберите сертификат, оплатите онлайн или в нашем офисе, и мы доставим его любым удобным способом. 
                Получатель сможет самостоятельно записаться на удобную дату и время для прохождения выбранной программы.
            </p>
            <a href="#" class="info-btn">Купить сертификат</a>
        </div>
    </main>

    <!-- Модальное окно заказа -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="form-title">Оформление заказа</h2>
            <form class="order-form" id="orderForm">
                <div class="selected-certificate">
                    <p id="selectedCertificateText"></p>
                    <p id="selectedCertificatePrice"></p>
                </div>
                
                <div class="form-group">
                    <label for="fullName">ФИО:</label>
                    <input type="text" id="fullName" name="fullName" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Телефон:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="comment">Комментарий:</label>
                    <textarea id="comment" name="comment" rows="3"></textarea>
                </div>
                
                <input type="hidden" id="certificateName" name="certificateName">
                <input type="hidden" id="certificatePrice" name="certificatePrice">
                
                <button type="submit" class="form-submit">Отправить заявку</button>
            </form>
        </div>
    </div>

    <!-- Подвал -->

    
<?php require_once 'includes/footer.php'; ?>

<style>
.toast-notification {
    position: fixed;
    top: 20px;
    right: -400px;
    max-width: 350px;
    background-color: #fff;
    padding: 16px 20px;
    border-radius: 8px;
    color: #fff;
    font-weight: 600;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    transition: right 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: inherit;
}
.toast-notification.success {
    background: linear-gradient(135deg, #10b981, #059669);
}
.toast-notification.error {
    background: linear-gradient(135deg, #ef4444, #dc2626);
}
.toast-notification.show {
    right: 20px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('orderModal');
    const closeBtn = document.querySelector('.close');
    const orderBtns = document.querySelectorAll('.order-btn');
    const orderForm = document.getElementById('orderForm');

    const selectedNameText = document.getElementById('selectedCertificateText');
    const selectedPriceText = document.getElementById('selectedCertificatePrice');
    const hiddenName = document.getElementById('certificateName');
    const hiddenPrice = document.getElementById('certificatePrice');
    const phoneInput = document.getElementById('phone');

    function showNotification(message, isSuccess) {
        let toast = document.getElementById('toastNotification');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'toastNotification';
            document.body.appendChild(toast);
        }
        
        const icon = isSuccess ? '<i class="fas fa-check-circle" style="font-size: 1.5rem;"></i>' : '<i class="fas fa-exclamation-circle" style="font-size: 1.5rem;"></i>';
        toast.innerHTML = icon + ' <span>' + message + '</span>';
        toast.className = 'toast-notification ' + (isSuccess ? 'success' : 'error');
        
        // Сброс анимации, если плашка уже открыта
        toast.classList.remove('show');
        void toast.offsetWidth;
        
        toast.classList.add('show');
        
        setTimeout(() => {
            toast.classList.remove('show');
        }, 4000);
    }

    // Маска телефона +7 (XXX) XXX-XX-XX
    if (phoneInput) {
        phoneInput.placeholder = '+7 (___) ___-__-__';
        phoneInput.pattern = '^(\\+7|8)\\s?\\(\\d{3}\\)\\s?\\d{3}-\\d{2}-\\d{2}$';
        phoneInput.title = 'Введите 11 цифр в формате +7 (XXX) XXX-XX-XX';

        phoneInput.addEventListener('input', function (e) {
            let input = e.target.value.replace(/\D/g, '');
            let formatted = '';

            if (['7', '8', '9'].indexOf(input[0]) > -1) {
                if (input[0] === '9') input = '7' + input;
                let firstSymbol = (input[0] === '8') ? '8' : '+7';
                formatted = firstSymbol + ' ';
                if (input.length > 1) formatted += '(' + input.substring(1, 4);
                if (input.length >= 5) formatted += ') ' + input.substring(4, 7);
                if (input.length >= 8) formatted += '-' + input.substring(7, 9);
                if (input.length >= 10) formatted += '-' + input.substring(9, 11);
            } else {
                formatted = '+' + input.substring(0, 15);
            }
            if (input.length === 0) formatted = '';
            e.target.value = formatted;
        });

        phoneInput.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && e.target.value.replace(/\D/g, '').length === 1) {
                e.target.value = '';
            }
        });
    }

    // Открытие модального окна
    orderBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const name = this.getAttribute('data-certificate');
            const price = this.getAttribute('data-price');
            
            selectedNameText.textContent = name;
            selectedPriceText.textContent = price + ' ₽';
            hiddenName.value = name;
            hiddenPrice.value = price;
            
            modal.style.display = 'block';
        });
    });

    // Закрытие модального окна
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Закрытие при клике вне окна
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Отправка формы 
    if (orderForm) {
        orderForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Отправка...';
            submitBtn.disabled = true;

            fetch('save_order.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Спасибо! Ваш заказ успешно оформлен.', true);
                    modal.style.display = 'none';
                    orderForm.reset();
                } else {
                    showNotification('Ошибка: ' + data.message, false);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                showNotification('Произошла ошибка при отправке. Пожалуйста, попробуйте позже.', false);
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }
});
</script>
