<?php
$pageCss = 'faq.css';
require_once 'includes/header.php';
?>


    <main class="faq-page">
        <h1 class="page-title">ВОПРОС-ОТВЕТ</h1>

        <div class="faq-container">
            <div class="faq-item">
                <button class="faq-question">1. Что нужно взять с собой для прыжка? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <ul>
                            <li>Документ, удостоверяющий личность (паспорт или водительское удостоверение);</li>
                            <li>Письменное разрешение от родителей для несовершеннолетних;</li>
                        </ul>
                        <p style="margin-top: 10px;"><strong>Для самостоятельного прыжка также необходимо взять с собой:</strong></p>
                        <ul>
                            <li>Берцы / кроссовки на толстой подошве + 2 эластичных бинта (по 1,5 метра на каждую ногу);</li>
                            <li>Удобную одежду, полностью закрывающую руки и ноги (её должно быть не жалко, так как она может испачкаться или порваться).</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">2. Можно ли снимать происходящее на камеру? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Начинающим парашютистам любая съемка в воздухе запрещена. Если Вы хотите запечатлеть свой первый прыжок, мы можем предложить Вам следующие варианты:</p>
                        <ul>
                            <li>Фото- и видеосъемка тандема воздушным оператором;</li>
                            <li>Видеосъемка тандема инструктором на камеру GoPro;</li>
                            <li>Съемка с камеры, установленной на крыле самолета.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">3. Обязательно ли прыгать первый раз вместе с инструктором? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Нет. Первый прыжок можно совершить самостоятельно на десантном парашюте с принудительным раскрытием.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">4. Если мне нет 18 лет, могу ли я прыгнуть с парашютом? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        Прыжки в тандеме разрешены с 8 лет, самостоятельные – с 14. С собой необходимо иметь письменное разрешение от родителей. Бланк разрешения можно найти на нашем сайте в разделе <a href="docs/blank.pdf" download class="doc-link">«материалы»</a>.
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">5. Когда осуществляются прыжки? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Наш аэроклуб работает по выходным с апреля по октябрь, в зависимости от погодных условий. Более актуальную информацию Вы можете получить по телефону: +7 (919) 023-40-00, или написав нам в социальных сетях.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">6. Прыгал в армии с Д-6 (Д-10), можно ли мне сразу одному с 3000 м.? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Армейские прыжки являются подготовкой к боевому десантированию, цель которого – доставка личного состава к месту выполнения боевой задачи. Такие прыжки не предусматривают навыков, необходимых для совершения спортивных затяжных прыжков.</p>
                        <p style="margin-top: 10px;">Так что, сколько бы у Вас не было прыжков в армии, обучение придётся проходить с самого начала. Тем не менее, любой опыт – это, несомненно, плюс).</p>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">7. А что если парашют не раскроется? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Наши парашюты укладывают только опытные укладчики, прошедшие специальную подготовку и регулярно подтверждающие свою квалификацию. Тем не менее для каждого начинающего парашютиста предусмотрен также запасной парашют со страхующим прибором.</div>
                </div>
            </div>

            <div class="faq-item">
                <button class="faq-question">8. Можно ли прыгнуть в тандеме вместе со своей второй половинкой? <i class="fas fa-plus faq-icon"></i></button>
                <div class="faq-answer">
                    <div class="faq-answer-inner">Совершить прыжок в тандеме можно только в компании опытного инструктора, способного обеспечивать Вашу безопасность на протяжении всего прыжка. Но вы можете прыгнуть в одном взлёте каждый со своим инструктором.</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Подвал -->

    

    <script>
        // Бургер меню
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
            });

            // Скрипт для аккордеона FAQ
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const button = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');

                button.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');

                    // Закрываем все остальные открытые вопросы
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.faq-answer').style.maxHeight = null;
                    });

                    // Если текущий был закрыт - открываем
                    if (!isActive) {
                        item.classList.add('active');
                        answer.style.maxHeight = answer.scrollHeight + "px";
                    }
                });
            });
        });
    </script>

    <a href="https://wa.me/+79190234000 ?text=3дравствуйте!" class="whatsapp-float" target="_blank" title="Написать в WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    



<?php require_once 'includes/footer.php'; ?>
