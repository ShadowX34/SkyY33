<script setup>
import { ref } from 'vue'

const activeItem = ref(null)

const toggleFaq = (index) => {
  if (activeItem.value === index) {
    activeItem.value = null // закрываем, если кликнули по открытому
  } else {
    activeItem.value = index // открываем новый
  }
}
</script>

<template>
  <div class="faq-page">
    <h1 class="page-title">ВОПРОС-ОТВЕТ</h1>

    <div class="faq-container">
      <div 
        class="faq-item" 
        :class="{ active: activeItem === 1 }"
      >
        <button class="faq-question" @click="toggleFaq(1)">
          1. Что нужно взять с собой для прыжка? <i class="fas fa-plus faq-icon"></i>
        </button>
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

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 2 }"
      >
        <button class="faq-question" @click="toggleFaq(2)">
          2. Можно ли снимать происходящее на камеру? <i class="fas fa-plus faq-icon"></i>
        </button>
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

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 3 }"
      >
        <button class="faq-question" @click="toggleFaq(3)">
          3. Обязательно ли прыгать первый раз вместе с инструктором? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">Нет. Первый прыжок можно совершить самостоятельно на десантном парашюте с принудительным раскрытием.</div>
        </div>
      </div>

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 4 }"
      >
        <button class="faq-question" @click="toggleFaq(4)">
          4. Если мне нет 18 лет, могу ли я прыгнуть с парашютом? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Прыжки в тандеме разрешены с 8 лет, самостоятельные – с 14. С собой необходимо иметь письменное разрешение от родителей. Бланк разрешения можно найти на нашем сайте в разделе <a href="/docs/zajavlenie-roditelej.pdf" download class="doc-link">«материалы»</a>.
          </div>
        </div>
      </div>

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 5 }"
      >
        <button class="faq-question" @click="toggleFaq(5)">
          5. Когда осуществляются прыжки? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">Наш аэроклуб работает по выходным с апреля по октябрь, в зависимости от погодных условий. Более актуальную информацию Вы можете получить по телефону: +7 (919) 023-40-00, или написав нам в социальных сетях.</div>
        </div>
      </div>

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 6 }"
      >
        <button class="faq-question" @click="toggleFaq(6)">
          6. Прыгал в армии с Д-6 (Д-10), можно ли мне сразу одному с 3000 м.? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            <p>Армейские прыжки являются подготовкой к боевому десантированию, цель которого – доставка личного состава к месту выполнения боевой задачи. Такие прыжки не предусматривают навыков, необходимых для совершения спортивных затяжных прыжков.</p>
            <p style="margin-top: 10px;">Так что, сколько бы у Вас не было прыжков в армии, обучение придётся проходить с самого начала. Тем не менее, любой опыт – это, несомненно, плюс).</p>
          </div>
        </div>
      </div>

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 7 }"
      >
        <button class="faq-question" @click="toggleFaq(7)">
          7. А что если парашют не раскроется? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">Наши парашюты укладывают только опытные укладчики, прошедшие специальную подготовку и регулярно подтверждающие свою квалификацию. Тем не менее для каждого начинающего парашютиста предусмотрен также запасной парашют со страхующим прибором.</div>
        </div>
      </div>

      <div 
        class="faq-item" 
        :class="{ active: activeItem === 8 }"
      >
        <button class="faq-question" @click="toggleFaq(8)">
          8. Можно ли прыгнуть в тандеме вместе со своей второй половинкой? <i class="fas fa-plus faq-icon"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">Совершить прыжок в тандеме можно только в компании опытного инструктора, способного обеспечивать Вашу безопасность на протяжении всего прыжка. Но вы можете прыгнуть в одном взлёте каждый со своим инструктором.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.faq-page { max-width: 900px; margin: 40px auto; padding: 0 20px; }
.page-title { font-size: 2.8rem; color: var(--primary-dark); margin-bottom: 50px; text-align: center; position: relative; padding-bottom: 20px; text-transform: uppercase; }
.page-title::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 80px; height: 4px; background: var(--secondary); }

.faq-container { display: flex; flex-direction: column; gap: 15px; }
.faq-item { background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); overflow: hidden; transition: var(--transition); border: 1px solid #eee; }
.faq-item.active { box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color: var(--primary); }

.faq-question { width: 100%; text-align: left; padding: 20px 25px; background: none; border: none; font-size: 1.2rem; font-weight: 600; color: var(--primary-dark); cursor: pointer; display: flex; justify-content: space-between; align-items: center; transition: 0.3s; font-family: 'Montserrat', sans-serif;}
.faq-question:hover { color: var(--primary); }
.faq-icon { color: var(--secondary); font-size: 1.2rem; transition: transform 0.3s ease; }
.faq-item.active .faq-icon { transform: rotate(45deg); }

.faq-answer { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out; background: #fdfdfd; }
.faq-item.active .faq-answer { max-height: 1000px; /* Достаточно большое число, чтобы поместился контент */ }

.faq-answer-inner { padding: 0 25px 25px; color: #444; font-size: 1.05rem; line-height: 1.7; }
.faq-answer-inner ul { margin-left: 20px; margin-top: 10px; }
.faq-answer-inner li { margin-bottom: 8px; }

.doc-link { color: var(--primary); font-weight: 600; text-decoration: underline; text-underline-offset: 3px; }
.doc-link:hover { color: var(--secondary); }
</style>
