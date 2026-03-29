import { prisma } from '../server.js'

// Статический массив имён авторов (из PHP)
const authorNames = {
  '1.png': 'Елена Григорьева', '2.png': 'Мария Соколова',
  '3.png': 'Алексей Новиков', '4.png': 'Сергей Орлов',
  '5.png': 'Ольга Захарова', '6.png': 'Ирина Козлова',
  '7.png': 'Светлана Морозова', '8.png': 'Дмитрий Волков',
  '9.png': 'Анна Лебедева', '10.png': 'Павел Смирнов',
  '11.png': 'Кирилл Фёдоров', '12.png': 'Наталья Петрова',
  '13.png': 'Виктория Иванова', '14.png': 'Александр Попов',
  '15.png': 'Юлия Семёнова', '16.png': 'Михаил Кузнецов',
  '17.png': 'Татьяна Белова', '18.png': 'Анастасия Яковлева',
  '19.png': 'Роман Громов', '20.png': 'Екатерина Тихонова',
  '21.png': 'Вадим Никитин', '22.png': 'Алина Степанова',
  '23.png': 'Константин Разумов', '24.png': 'Людмила Сорокина',
  '25.png': 'Евгений Пономарёв'
}

export default async function (fastify, opts) {
  // Слайдер отзывов
  fastify.get('/reviews', async (request, reply) => {
    try {
      const reviews = await prisma.review.findMany({
        where: { type: 'slider', is_active: true },
        orderBy: [ { sort_order: 'asc' }, { id: 'asc' } ]
      })
      
      // Добавляем имена
      const formattedReviews = reviews.map(r => ({
        ...r,
        author_name: authorNames[r.image] || 'Наш клиент'
      }))

      // Если пустая БД, отдаем дефолт
      if (formattedReviews.length === 0) {
        return [{
          image: '1.png', 
          review_text: 'Если вы еще не прыгали с парашютом, то многое потеряли. Это незабываемые впечатления, крутой подарок и красота нереальная!',
          author_name: 'Елена Григорьева'
        }]
      }
      return formattedReviews

    } catch (error) {
      fastify.log.error(error)
      reply.status(500).send({ error: 'Failed to fetch reviews' })
    }
  })

  // Благодарности
  fastify.get('/gratitudes', async (request, reply) => {
    try {
      const gratitudes = await prisma.review.findMany({
        where: { type: 'gratitude', is_active: true },
        orderBy: [ { sort_order: 'asc' }, { id: 'asc' } ]
      })
      if (gratitudes.length === 0) {
        return [
          { image: '11.jpg', caption: 'Благодарность 1' },
          { image: '22.jpg', caption: 'Благодарность 2' }
        ]
      }
      return gratitudes
    } catch (error) {
      fastify.log.error(error)
      reply.status(500).send({ error: 'Failed to fetch gratitudes' })
    }
  })
}
