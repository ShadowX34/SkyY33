<script setup>
import { ref, reactive } from 'vue'
import { useApi } from '../composables/useApi'

const { post } = useApi()

// Список сертификатов (статичные данные, как в оригинале)
const certificates = [
  {
    id: 1,
    title: 'ОЗНАКОМИТЕЛЬНЫЙ ПОЛЕТ',
    price: 4000,
    image: 'б1.webp',
    description: 'Никак не можешь решиться на прыжок с парашютом, а адреналина всё равно хочется? Тогда полёт на самолете - идеальный вариант для первого знакомства с небом!'
  },
  {
    id: 2,
    title: 'ПРЫЖОК В ТАНДЕМЕ С ИНСТРУКТОРОМ',
    price: 12000,
    image: 'б2.webp',
    description: 'Прыжок в тандеме с инструктором - это отличный способ познакомиться с небом, ощутить весь спектр эмоций от свободного падения и мягкого приземления под куполом парашюта.'
  },
  {
    id: 3,
    title: 'САМОСТОЯТЕЛЬНЫЙ ПРЫЖОК',
    price: 8500,
    image: 'б3.webp',
    description: 'Самостоятельный прыжок с парашютом - это отличный способ осуществить свою мечту, прикоснуться к небу и почувствовать себя настоящим парашютистом.'
  },
  {
    id: 4,
    title: 'ПРЫЖОК В ТАНДЕМЕ С ФОТО-ВИДЕОСЪЁМКОЙ',
    price: 18000,
    image: 'б4.webp',
    description: 'Запечатлейте свой прыжок на память! Профессиональная фото и видео съемка позволят вам переживать эти незабываемые моменты снова и снова.'
  },
  {
    id: 5,
    title: 'ПРЫЖОК В ТАНДЕМЕ С ОПЕРАТОРОМ И GOPRO',
    price: 16500,
    image: 'б5.webp',
    description: 'Экстремальная съемка вашего прыжка на камеру GoPro с разных ракурсов. Вы получите динамичное видео в высоком качестве, которым сможете поделиться с друзьями.'
  },
  {
    id: 6,
    title: 'ПРЫЖОК В ТАНДЕМЕ С СЪЁМКОЙ НА GOPRO',
    price: 17500,
    image: 'б6.webp',
    description: 'Давно мечтаете покорить воздушную стихию? Но никак не можете решиться на отчаянный шаг в «пропасть». Прыжок с оператором - это безопасно и незабываемо!'
  }
]

// Состояние модального окна
const isModalOpen = ref(false)
const selectedCert = ref(null)

// Данные формы
const form = reactive({
  fullName: '',
  phone: '',
  email: '',
  comment: ''
})

const isSubmitting = ref(false)

// Маска телефона +7 (XXX) XXX-XX-XX
const formatPhone = (e) => {
  let value = e.target.value.replace(/\D/g, '') // только цифры
  
  // Убираем первую 7 или 8, если уже стоит
  if (value.startsWith('8')) value = '7' + value.slice(1)
  if (!value.startsWith('7')) value = '7' + value
  
  // Ограничиваем до 11 цифр
  value = value.slice(0, 11)
  
  // Форматируем
  let formatted = '+7'
  if (value.length > 1) formatted += ' (' + value.slice(1, 4)
  if (value.length >= 4) formatted += ') ' + value.slice(4, 7)
  if (value.length >= 7) formatted += '-' + value.slice(7, 9)
  if (value.length >= 9) formatted += '-' + value.slice(9, 11)
  
  form.phone = formatted
  e.target.value = formatted
}

const openModal = (cert) => {
  selectedCert.value = cert
  isModalOpen.value = true
}

const closeModal = () => {
  isModalOpen.value = false
  // Сбрасываем форму после закрытия
  form.fullName = ''
  form.phone = ''
  form.email = ''
  form.comment = ''
}

const submitOrder = async () => {
  if (!form.fullName.trim() || !form.phone.trim() || !form.email.trim()) {
    alert('Пожалуйста, заполните обязательные поля')
    return
  }

  // Проверка длины телефона — должно быть 11 цифр
  const digitsOnly = form.phone.replace(/\D/g, '')
  if (digitsOnly.length < 11) {
    alert('Пожалуйста, введите полный номер телефона')
    return
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(form.email)) {
    alert('Пожалуйста, введите корректный email')
    return
  }

  isSubmitting.value = true

  try {
    const payload = {
      certificateName: selectedCert.value.title,
      certificatePrice: selectedCert.value.price,
      fullName: form.fullName,
      phone: form.phone,
      email: form.email,
      comment: form.comment
    }

    const response = await post('/orders', payload)
    
    // В успешном ответе сервер возвратит data.message
    alert(response.data.message || 'Заявка успешно отправлена!')
    closeModal()
  } catch (error) {
    console.error('Ошибка при отправке заказа:', error)
    alert(error.response?.data?.error || 'Ошибка при отправке заказа. Попробуйте позже.')
  } finally {
    isSubmitting.value = false
  }
}
</script>

<template>
  <main class="certificates-page">
    <h1 class="page-title">ПОДАРОЧНЫЕ СЕРТИФИКАТЫ</h1>
    <p class="page-description">
      Подарите незабываемые эмоции и яркие впечатления своим близким! Наши сертификаты - это идеальный подарок для тех, кто любит экстрим и новые ощущения.
    </p>
    
    <!-- Сетка сертификатов -->
    <div class="certificates-grid">
      <div v-for="cert in certificates" :key="cert.id" class="certificate-card">
        <div class="certificate-image" :style="{ backgroundImage: `url(/images/${cert.image})` }">
          <div class="certificate-price">{{ cert.price }}₽</div>
        </div>
        <div class="certificate-content">
          <h2 class="certificate-title">{{ cert.title }}</h2>
          <p class="certificate-description">{{ cert.description }}</p>
          <button class="certificate-btn" @click="openModal(cert)">Заказать</button>
        </div>
      </div>
    </div>
    
    <!-- Дополнительная информация -->
    <div class="info-section">
      <h2 class="info-title">Как это работает?</h2>
      <p class="info-text">
        Выберите сертификат, оплатите онлайн или в нашем офисе, и мы доставим его любым удобным способом. 
        Получатель сможет самостоятельно записаться на удобную дату и время для прохождения выбранной программы.
      </p>
      <!-- Ссылка скроллит вверх к карточкам (поведение заглушки в PHP) -->
      <a href="#" @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })" class="info-btn">Купить сертификат</a>
    </div>

    <!-- Модальное окно -->
    <div v-if="isModalOpen" class="modal" @click.self="closeModal">
      <div class="modal-content">
        <span class="close" @click="closeModal">&times;</span>
        <h2 class="form-title">Оформление заказа</h2>
        
        <form class="order-form" @submit.prevent="submitOrder">
          <div class="selected-certificate" v-if="selectedCert">
            <p>{{ selectedCert.title }}</p>
            <p>{{ selectedCert.price }}₽</p>
          </div>
          
          <div class="form-group">
            <label for="fullName">ФИО:</label>
            <input type="text" id="fullName" v-model="form.fullName" required placeholder="Иванов Иван Иванович">
          </div>
          
          <div class="form-group">
            <label for="phone">Телефон:</label>
            <input 
              type="tel" 
              id="phone" 
              :value="form.phone"
              @input="formatPhone"
              required 
              placeholder="+7 (___) ___-__-__"
              maxlength="18"
            >
          </div>
          
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" v-model="form.email" required placeholder="example@mail.ru">
          </div>
          
          <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea id="comment" v-model="form.comment" rows="3" placeholder="Дополнительные пожелания..."></textarea>
          </div>
          
          <button type="submit" class="form-submit" :disabled="isSubmitting">
            {{ isSubmitting ? 'Отправка...' : 'Отправить заявку' }}
          </button>
        </form>
      </div>
    </div>
  </main>
</template>

<style scoped>
.certificates-page {
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

.page-description {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 50px;
  font-size: 1.1rem;
  color: var(--gray);
}

.certificates-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  gap: 30px;
}

.certificate-card {
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  transition: var(--transition);
  display: flex;
  flex-direction: column;
}

.certificate-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.certificate-image {
  height: 250px;
  width: 100%;
  background-size: cover;
  background-position: center;
  position: relative;
}

.certificate-price {
  position: absolute;
  top: 20px;
  right: 20px;
  background: var(--secondary);
  color: var(--dark);
  font-weight: 700;
  padding: 8px 20px;
  border-radius: 30px;
  font-size: 1.3rem;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
  z-index: 2;
}

.certificate-content {
  padding: 30px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.certificate-title {
  font-size: 1.6rem;
  font-weight: 700;
  color: var(--primary);
  margin-bottom: 15px;
  line-height: 1.2;
}

.certificate-description {
  font-size: 1.1rem;
  line-height: 1.7;
  margin-bottom: 25px;
  color: #555;
  flex-grow: 1;
}

.certificate-btn {
  display: inline-block;
  padding: 12px 30px;
  background-color: var(--primary);
  color: white;
  border: none;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1rem;
  transition: var(--transition);
  text-align: center;
  align-self: flex-start;
  cursor: pointer;
}

.certificate-btn:hover {
  background-color: var(--primary-dark);
  transform: translateY(-3px);
}

/* Блок дополнительной информации */
.info-section {
  background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), 
               url('https://images.unsplash.com/photo-1518633945839-8b6310925b68?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
  background-size: cover;
  background-position: center;
  padding: 50px;
  border-radius: 15px;
  margin: 60px 0;
  text-align: center;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.info-title {
  font-size: 2rem;
  color: var(--primary-dark);
  margin-bottom: 20px;
  font-weight: 700;
}

.info-text {
  max-width: 800px;
  margin: 0 auto 30px;
  font-size: 1.1rem;
  line-height: 1.6;
}

.info-btn {
  display: inline-block;
  padding: 15px 40px;
  background-color: var(--secondary);
  color: var(--dark);
  border-radius: 50px;
  text-decoration: none;
  font-weight: 700;
  transition: var(--transition);
  font-size: 1.1rem;
  border: 2px solid var(--secondary);
}

.info-btn:hover {
  background-color: transparent;
  color: var(--dark);
  transform: translateY(-3px);
}

/* Стили модального окна */
.modal {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.7);
}

.modal-content {
  background-color: #fefefe;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 30px rgba(0,0,0,0.3);
  width: 90%;
  max-width: 600px;
  position: relative;
  animation: modalopen 0.4s;
  max-height: 90vh;
  overflow-y: auto;
}

@keyframes modalopen {
  from { opacity: 0; transform: translateY(-50px); }
  to { opacity: 1; transform: translateY(0); }
}

.close {
  position: absolute;
  right: 25px;
  top: 15px;
  color: #aaa;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s;
}

.close:hover {
  color: #333;
  transform: rotate(90deg);
}

.form-title {
  color: var(--primary-dark);
  margin-bottom: 25px;
  text-align: center;
  font-size: 1.8rem;
  font-weight: 700;
}

.order-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  margin-bottom: 8px;
  font-weight: 600;
  color: #555;
}

.form-group input,
.form-group textarea {
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  transition: all 0.3s;
  font-family: 'Montserrat', sans-serif;
}

.form-group input:focus,
.form-group textarea:focus {
  border-color: var(--primary);
  outline: none;
  box-shadow: 0 0 0 3px rgba(33, 109, 189, 0.2);
}

.form-submit {
  background-color: var(--primary);
  color: white;
  border: none;
  padding: 15px;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s;
  margin-top: 10px;
}

.form-submit:hover:not(:disabled) {
  background-color: var(--primary-dark);
  transform: translateY(-2px);
}

.form-submit:disabled {
  background-color: #a0c4e8;
  cursor: not-allowed;
}

.selected-certificate {
  background-color: #f0f7ff;
  padding: 15px;
  border-radius: 8px;
  margin-bottom: 5px;
  border-left: 4px solid var(--primary);
}

.selected-certificate p {
  margin: 0;
  font-weight: 600;
  color: var(--primary-dark);
  line-height: 1.4;
}

@media (max-width: 768px) {
  .certificates-grid {
    grid-template-columns: 1fr;
  }
}
</style>
