<?php
$pageCss = 'prices.css';
require_once 'includes/header.php';
require_once 'includes/db_connect.php';

// Инициализируем массивы по умолчанию (резервные копии на случай, если БД пуста или не мигрирована)
$jumps = [
    ['service_name' => 'Самостоятельный прыжок первый раз на круглом куполе', 'unit' => '1', 'price' => 6000],
    ['service_name' => 'Прыжок с инструктором в тандеме*', 'unit' => '1', 'price' => 15500],
    ['service_name' => 'Прыжок с инструктором в тандеме*(в будние дни)**', 'unit' => '1', 'price' => 15000],
    ['service_name' => 'Прыжок с инструктором в тандеме с фото- и видеосъемкой*', 'unit' => '1', 'price' => 20000],
    ['service_name' => 'Прыжок с инструктором в тандеме с фото- и видеосъемкой*(в будние дни)**', 'unit' => '1', 'price' => 19500],
    ['service_name' => 'Прыжок с инструктором в тандеме с видеосъемкой GoPro*', 'unit' => '1', 'price' => 17500],
    ['service_name' => 'Прыжок с инструктором в тандеме с видеосъемкой GoPro*(в будние дни)**', 'unit' => '1', 'price' => 17000],
    ['service_name' => 'Ознакомительный полет на самолете Ан-2', 'unit' => '1', 'price' => 4000],
    ['service_name' => 'Прыжок по второй программе', 'unit' => '1', 'price' => 4500],
    ['service_name' => 'Повторный прыжок по второй программе в этот же день', 'unit' => '1', 'price' => 4000],
    ['service_name' => 'Спортивный прыжок до 1500 метров', 'unit' => '1', 'price' => 2000],
    ['service_name' => 'Спортивный прыжок выше 1500 метров', 'unit' => '1', 'price' => 2500],
    ['service_name' => 'Прыжок с парашютом "Арбалет-2" на стабилизацию', 'unit' => '1', 'price' => 7000],
];

$rent = [
    ['service_name' => 'Аренда парашютной системы (на 1 прыжок)', 'unit' => '1', 'price' => 700],
    ['service_name' => 'Аренда комбинезона (на 1 день)', 'unit' => '1', 'price' => 300],
    ['service_name' => 'Аренда высотомера (на 1 прыжок)', 'unit' => '1', 'price' => 150],
    ['service_name' => 'Аренда высотомера (на 1 день)', 'unit' => '1', 'price' => 300],
    ['service_name' => 'Аренда очков (на 1 день)', 'unit' => '1', 'price' => 100],
];

$rigger = [
    ['service_name' => 'Укладка спортивной системы', 'unit' => '1', 'price' => 300],
    ['service_name' => 'Укладка запасного купола', 'unit' => '1', 'price' => 3000],
    ['service_name' => 'Укладка системы "Тандем"', 'unit' => '1', 'price' => 600],
    ['service_name' => 'Укладка Д-10', 'unit' => '1', 'price' => 400],
    ['service_name' => 'Укладка Д-1-5у', 'unit' => '1', 'price' => 400],
    ['service_name' => 'Укладка 3-6П', 'unit' => '1', 'price' => 400],
];

try {
    // Пытаемся получить актуальные цены из БД
    $stmt = $pdo->query("SELECT * FROM prices WHERE is_active=1 ORDER BY sort_order ASC, id ASC");
    $dbPrices = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (!empty($dbPrices)) {
        $tempJumps = [];
        $tempRent = [];
        $tempRigger = [];
        
        foreach ($dbPrices as $p) {
            if ($p['category'] === 'jumps') {
                $tempJumps[] = $p;
            } elseif ($p['category'] === 'rent') {
                $tempRent[] = $p;
            } elseif ($p['category'] === 'rigger') {
                $tempRigger[] = $p;
            }
        }
        
        // Перезаписываем массивы только если они найдены в БД
        if (!empty($tempJumps)) $jumps = $tempJumps;
        if (!empty($tempRent)) $rent = $tempRent;
        if (!empty($tempRigger)) $rigger = $tempRigger;
    }
} catch (PDOException $e) {
    // В случае если таблицы еще нет, просто молча используем статические данные
}
?>



    <!-- Блок 1 -->

    <main class="prices-page">
        <h1 class="page-title">ЦЕНЫ НА УСЛУГИ</h1>
        
        <!-- Таблица прыжков и полетов -->
        <h2 class="section-title">ПРЫЖКИ И ПОЛЁТЫ</h2>
        <table class="price-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Наименование услуги</th>
                    <th>Ед.изм.</th>
                    <th>Цена за ед.</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($jumps as $p): ?>
                <tr>
                    <td><?= (stripos($p['service_name'], 'будние дни') !== false) ? '' : $i++ ?></td>
                    <td><?= htmlspecialchars($p['service_name']) ?></td>
                    <td><?= htmlspecialchars($p['unit'] ?? '1') ?></td>
                    <td class="price-highlight"><?= number_format($p['price'], 0, '.', ' ') ?> ₽</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="note">
            <div class="note-title">Примечания:</div>
            <p>* Цена на прыжок в тандеме указана для пассажиров весом до 90 кг. При весе свыше 90кг доплата 500р за каждые 5кг. При весе свыше 110кг, прыжок по согласованию с тандем-инструктором.</p>
            <p>** Скидка действует в дни проведения прыжков, кроме выходных и праздничных дней. При приобретении сертификата и совершении прыжка по сертификату в день действия акции разница в стоимости не возмещается.</p>
        </div>
        
        <!-- Таблица аренды снаряжения -->
        <h2 class="section-title">АРЕНДА СНАРЯЖЕНИЯ</h2>
        <table class="price-table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Наименование услуги</th>
                    <th>Ед.изм.</th>
                    <th>Цена за ед.</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($rent as $p): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($p['service_name']) ?></td>
                    <td><?= htmlspecialchars($p['unit'] ?? '1') ?></td>
                    <td class="price-highlight"><?= number_format($p['price'], 0, '.', ' ') ?> ₽</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Блок 2: Риггерские услуги -->
<h2 class="section-title">РИГГЕРСКИЕ УСЛУГИ</h2>
<table class="price-table">
    <thead>
        <tr>
            <th>№</th>
            <th>Наименование услуги</th>
            <th>Ед.изм.</th>
            <th>Цена за ед.</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($rigger as $p): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($p['service_name']) ?></td>
            <td><?= htmlspecialchars($p['unit'] ?? '1') ?></td>
            <td class="price-highlight"><?= number_format($p['price'], 0, '.', ' ') ?> ₽</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Способы оплаты -->
<h2 class="section-title">СПОСОБЫ ОПЛАТЫ</h2>

<div class="payment-methods">
    <div class="payment-method">
        <h3 class="payment-title">Наличный расчёт</h3>
    </div>
    
    <div class="payment-method">
        <h3 class="payment-title">Банковская карта</h3>
        <div class="payment-content">
            <p>Для выбора оплаты товара с помощью банковской карты на соответствующей странице необходимо нажать кнопку "Оплата заказа банковской картой".</p>
            <p>Для оплаты (ввода реквизитов Вашей карты) Вы будете перенаправлены на платёжный шлюз ПАО СБЕРБАНК. Соединение с платёжным шлюзом и передача информации осуществляется в защищённом режиме с использованием протокола шифрования SSL.</p>
            <p>В случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By Visa, MasterCard SecureCode, MIR Accept, J-Secure для проведения платежа также может потребоваться ввод специального пароля. Настоящий сайт поддерживает 256-битное шифрование.</p>
            <p>Конфиденциальность сообщаемой персональной информации обеспечивается ПАО СБЕРБАНК. Введённая информация не будет предоставлена третьим лицам за исключением случаев, предусмотренных законодательством РФ.</p>
            <p>Проведение платежей по банковским картам осуществляется в строгом соответствии с требованиями платёжных систем МИР, Visa Int., MasterCard Europe Sptl, JCB.</p>
            <p>Оплата происходит через ПАО СБЕРБАНК с использованием банковских карт следующих платёжных систем:</p>
        </div>
    </div>
    
    <div class="payment-method">
        <h3 class="payment-title">Возврат товара</h3>
        <div class="payment-content">
            <p>Срок возврата средств в случае отказа от услуги составляет 14 дней с момента оплаты.</p>
            <p>Возврат переведённых средств производится на ваш банковский счёт в течение 5-30 рабочих дней (срок зависит от банка, который выдал вашу банковскую карту).</p>
        </div>
    </div>
</div>

 <!-- Специальное предложение -->
        <div class="special-offer">
            <h2 class="offer-title">СПЕЦИАЛЬНОЕ ПРЕДЛОЖЕНИЕ</h2>
            <div class="offer-content">
                <div class="offer-text">
                    <p>Запишитесь на прыжок в будний день и получите скидку до 500 рублей! Акция действует в дни проведения прыжков, кроме выходных и праздничных дней.</p>
                    <p>При покупке сертификата скидка фиксируется автоматически.</p>
                </div>
                <a href="certificates.php"><button class="offer-btn">ЗАПИСАТЬСЯ СО СКИДКОЙ</button></a>
            </div>
        </div>
    </main>

    <!-- Подвал -->

    
<?php require_once 'includes/footer.php'; ?>
