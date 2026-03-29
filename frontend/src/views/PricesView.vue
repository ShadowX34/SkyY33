<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <div class="prices-page">
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
            <tr>
                <td>1</td>
                <td>Самостоятельный прыжок первый раз на круглом куполе</td>
                <td>1</td>
                <td class="price-highlight">6 000 ₽</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Прыжок с инструктором в тандеме*</td>
                <td>1</td>
                <td class="price-highlight">15 500 ₽</td>
            </tr>
            <tr>
                <td></td>
                <td>Прыжок с инструктором в тандеме*(в будние дни)**</td>
                <td>1</td>
                <td class="price-highlight">15 000 ₽</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Прыжок с инструктором в тандеме с фото- и видеосъемкой*</td>
                <td>1</td>
                <td class="price-highlight">20 000 ₽</td>
            </tr>
            <tr>
                <td></td>
                <td>Прыжок с инструктором в тандеме с фото- и видеосъемкой*(в будние дни)**</td>
                <td>1</td>
                <td class="price-highlight">19 500 ₽</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Прыжок с инструктором в тандеме с видеосъемкой GoPro*</td>
                <td>1</td>
                <td class="price-highlight">17 500 ₽</td>
            </tr>
            <tr>
                <td></td>
                <td>Прыжок с инструктором в тандеме с видеосъемкой GoPro*(в будние дни)**</td>
                <td>1</td>
                <td class="price-highlight">17 000 ₽</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Ознакомительный полет на самолете Ан-2</td>
                <td>1</td>
                <td class="price-highlight">4 000 ₽</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Прыжок по второй программе</td>
                <td>1</td>
                <td class="price-highlight">4 500 ₽</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Повторный прыжок по второй программе в этот же день</td>
                <td>1</td>
                <td class="price-highlight">4 000 ₽</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Спортивный прыжок до 1500 метров</td>
                <td>1</td>
                <td class="price-highlight">2 000 ₽</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Спортивный прыжок выше 1500 метров</td>
                <td>1</td>
                <td class="price-highlight">2 500 ₽</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Прыжок с парашютом "Арбалет-2" на стабилизацию</td>
                <td>1</td>
                <td class="price-highlight">7 000 ₽</td>
            </tr>
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
            <tr>
                <td>1</td>
                <td>Аренда парашютной системы (на 1 прыжок)</td>
                <td>1</td>
                <td class="price-highlight">700 ₽</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Аренда комбинезона (на 1 день)</td>
                <td>1</td>
                <td class="price-highlight">300 ₽</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Аренда высотомера (на 1 прыжок)</td>
                <td>1</td>
                <td class="price-highlight">150 ₽</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Аренда высотомера (на 1 день)</td>
                <td>1</td>
                <td class="price-highlight">300 ₽</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Аренда очков (на 1 день)</td>
                <td>1</td>
                <td class="price-highlight">100 ₽</td>
            </tr>
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
            <tr>
                <td>1</td>
                <td>Укладка спортивной системы</td>
                <td>1</td>
                <td class="price-highlight">300 ₽</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Укладка запасного купола</td>
                <td>1</td>
                <td class="price-highlight">3 000 ₽</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Укладка системы "Тандем"</td>
                <td>1</td>
                <td class="price-highlight">600 ₽</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Укладка Д-10</td>
                <td>1</td>
                <td class="price-highlight">400 ₽</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Укладка Д-1-5у</td>
                <td>1</td>
                <td class="price-highlight">400 ₽</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Укладка 3-6П</td>
                <td>1</td>
                <td class="price-highlight">400 ₽</td>
            </tr>
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
                <p>Оплата происходит через ПАО СБЕРБАНК с использованием банковских карт соответствующих платёжных систем.</p>
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
            <RouterLink to="/certificates"><button class="offer-btn">ЗАПИСАТЬСЯ СО СКИДКОЙ</button></RouterLink>
        </div>
    </div>
  </div>
</template>

<style scoped>
.prices-page {
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
}

.page-title {
  font-size: 2.8rem;
  color: var(--primary-dark);
  margin-bottom: 30px;
  text-align: center;
  position: relative;
  padding-bottom: 20px;
}

.page-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 4px;
  background: var(--secondary);
}

.section-title {
  font-size: 1.8rem;
  color: var(--primary);
  margin: 50px 0 20px;
  padding-bottom: 10px;
  border-bottom: 2px solid var(--secondary);
}

.price-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 30px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  background: white;
  border-radius: 10px;
  overflow: hidden;
}

.price-table th,
.price-table td {
  padding: 15px 20px;
  text-align: left;
  border-bottom: 1px solid #eee;
}

.price-table th {
  background-color: var(--primary-dark);
  color: white;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.9rem;
}

.price-table tr:last-child td {
  border-bottom: none;
}

.price-table tr:hover {
  background-color: #f8f9fc;
}

.price-highlight {
  font-weight: 700;
  color: var(--primary-dark);
  font-size: 1.1rem;
  white-space: nowrap;
}

table td:first-child { text-align: center; font-weight: 600; color: #888; width: 50px; }
table th:first-child { text-align: center; }

.note {
  background-color: #fef8dd;
  border-left: 5px solid var(--secondary);
  padding: 20px;
  margin-bottom: 40px;
  border-radius: 0 10px 10px 0;
  color: #555;
  font-size: 0.95rem;
}

.note-title { font-weight: 700; color: var(--dark); margin-bottom: 5px; }
.note p { margin-bottom: 5px; }

.payment-methods {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.payment-method {
  background: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s;
}

.payment-method:hover { transform: translateY(-5px); }

.payment-title {
  color: var(--primary-dark);
  font-size: 1.3rem;
  margin-bottom: 15px;
  padding-bottom: 10px;
  border-bottom: 2px solid #eee;
}

.payment-content p {
  margin-bottom: 10px;
  font-size: 0.95rem;
  color: #555;
}

.special-offer {
  background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
  border-radius: 15px;
  padding: 40px;
  color: white;
  text-align: center;
  position: relative;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(33, 109, 189, 0.3);
}

.offer-title {
  font-size: 2rem;
  margin-bottom: 20px;
  color: var(--secondary);
  text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.offer-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  position: relative;
  z-index: 1;
}

.offer-text p {
  font-size: 1.1rem;
  margin-bottom: 10px;
  max-width: 800px;
}

.offer-btn {
  background-color: var(--secondary);
  color: var(--dark);
  border: none;
  padding: 15px 40px;
  font-size: 1.1rem;
  font-weight: 700;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-top: 15px;
  box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

.offer-btn:hover {
  background-color: #ffca28;
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(255, 193, 7, 0.6);
}

@media (max-width: 768px) {
  .price-table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }
  .page-title { font-size: 2.2rem; }
  .section-title { font-size: 1.5rem; }
  .offer-title { font-size: 1.5rem; }
  .special-offer { padding: 30px 20px; }
}
</style>
