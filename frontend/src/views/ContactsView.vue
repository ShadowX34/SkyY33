<script setup>
</script>

<template>
  <div class="contacts-page">
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
                    <p>Мы находимся недалеко от старинного русского города Владимир. От Москвы всего в 190 км (2,5 часах езды на машине).</p>
                    <p>Выезжаем из города Владимир в сторону Н. Новгорода и движемся прямо 8 км, до поворота на с. Добрынское, проезжая п. Боголюбово и мост через р. Нерль, поворачиваем налево, после чего ещё 5км до въезда на аэродром (остановка "Аэропорт").</p>
                    <p>После въезда на территорию аэродрома поворачиваем направо и едем прямо до упора.</p>
                    <p>Если прибываете на общественном транспорте, от вокзала к нам ходит автобус №102. Доезжаем до остановки "Аэропорт", заходим в ворота и идём направо 650м.</p>
                    <p>После парашютных прыжков можно очень хорошо отдохнуть. Желающие могут прокатиться в город-музей Суздаль.</p>
                </div>
            </div>
            
            <div class="divider"></div>
            
            <div class="contacts-section">
                <h2>Реквизиты</h2>
                <div class="contact-text">
                    <p><strong>НОУ "Владимирский АСК ДОСААФ РОССИИ"</strong></p>
                    <p>ИНН 3327317812</p>
                    <p>ОГРН 1033301809265</p>
                    <p><strong>Юридический адрес:</strong> 600022, г. Владимир, территория Аэропорта (Семязино), стр. 4</p>
                </div>
            </div>
        </div>
    
    
        <div class="contacts-info">
            <div class="contacts-section">
                <h2>Режим работы</h2>
                <div class="contact-schedule">
                    <div class="schedule-day">
                        <span class="day-name">Четверг:</span>
                        <span class="day-activity">Прыжок с инструктором в тандеме<br>Ознакомительный полет на самолете</span>
                    </div>
                    <div class="schedule-day">
                        <span class="day-name">Суббота - Воскресенье:</span>
                        <span class="day-activity">Самостоятельный прыжок на круглом куполе<br>Прыжок с инструктором в тандеме<br>Ознакомительный полет на самолете</span>
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
                    <a href="#" style="color: var(--primary);">Актуальная версия политики конфиденциальности</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<style scoped>
.contacts-page {
  max-width: 1200px;
  margin: 40px auto;
  padding: 0 20px;
}

.page-title {
  font-size: 2.8rem;
  color: var(--primary-dark);
  margin-bottom: 40px;
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

.contacts-container {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: 40px;
  margin-bottom: 50px;
}

.contacts-info {
  background: white;
  border-radius: 15px;
  padding: 30px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.contacts-map {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  height: 100%;
}

.contacts-section {
  margin-bottom: 30px;
}

.contacts-section h2 {
  font-size: 1.8rem;
  color: var(--primary-dark);
  margin-bottom: 20px;
  position: relative;
  padding-bottom: 10px;
}

.contacts-section h2::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 50px;
  height: 3px;
  background: var(--secondary);
}

.contact-item {
  display: flex;
  align-items: flex-start;
  margin-bottom: 15px;
}

.contact-icon {
  color: var(--secondary);
  font-size: 1.2rem;
  margin-right: 15px;
  margin-top: 3px;
}

.contact-text {
  font-size: 1.1rem;
  line-height: 1.6;
}

.contact-text p {
  margin-bottom: 10px;
}

.contact-text a {
  color: var(--primary);
  text-decoration: none;
  transition: var(--transition);
}

.contact-text a:hover {
  color: var(--primary-dark);
  text-decoration: underline;
}

.contact-schedule {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.schedule-day {
  display: flex;
  justify-content: space-between;
  padding-bottom: 10px;
  border-bottom: 1px dashed #eee;
}

.day-name {
  font-weight: 600;
  color: var(--primary-dark);
  flex-shrink: 0;
  margin-right: 20px;
}

.day-activity {
  color: #555;
  text-align: right;
}

.divider {
  height: 1px;
  background-color: #eee;
  margin: 30px 0;
}

/* Мобильные стили */
@media (max-width: 900px) {
  .contacts-container {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .contacts-page {
    padding: 0 15px;
    margin: 20px auto;
  }
  
  .page-title {
    font-size: 2rem;
    margin-bottom: 30px;
    padding-bottom: 15px;
  }
  
  .contacts-info {
    padding: 20px;
  }
  
  .contacts-section h2 {
    font-size: 1.5rem;
  }
  
  .contact-text, .day-activity {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .page-title {
    font-size: 1.8rem;
  }
  
  .contact-item {
    flex-direction: column;
    gap: 5px;
  }
  
  .schedule-day {
    flex-direction: column;
    gap: 5px;
  }
  
  .day-activity {
    text-align: left;
  }
}
</style>
