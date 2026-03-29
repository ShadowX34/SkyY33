import { prisma } from '../server.js'

export default async function (fastify, opts) {
  // Обработка отправки формы заказа
  fastify.post('/orders', async (request, reply) => {
    try {
      // Тут нужно будет провалидировать тело
      const { certificateName, certificatePrice, fullName, phone, email, comment } = request.body

      if (!fullName || !phone || !email || !certificateName || !certificatePrice) {
        return reply.status(400).send({ success: false, error: 'Заполните все обязательные поля' })
      }

      const order = await prisma.certificateOrder.create({
        data: {
          certificate_name: String(certificateName),
          certificate_price: parseFloat(certificatePrice),
          full_name: String(fullName),
          phone: String(phone),
          email: String(email),
          comment: comment ? String(comment) : null,
          status: 'Новый'
        }
      })

      return { success: true, message: `Заказ успешно сохранен! ID: ${order.id}` }
    } catch (error) {
      console.error('CRITICAL DATABASE ERROR:', error)
      reply.status(500).send({ success: false, error: 'Database error: ' + error.message })
    }
  })
}
