import { FastifyInstance } from 'fastify'

interface OrderBody {
  certificateName: string
  certificatePrice: number
  fullName: string
  phone: string
  email: string
  comment?: string
}

export default async function ordersRoutes(app: FastifyInstance) {
  // POST /api/orders — создать новый заказ сертификата
  app.post<{ Body: OrderBody }>('/orders', async (request, reply) => {
    const { certificateName, certificatePrice, fullName, phone, email, comment } = request.body

    // Валидация
    const errors: string[] = []
    if (!fullName?.trim()) errors.push('ФИО обязательно для заполнения')
    if (!phone?.trim()) errors.push('Телефон обязателен для заполнения')
    if (!email || !/\S+@\S+\.\S+/.test(email)) errors.push('Некорректный email')
    if (!certificateName?.trim()) errors.push('Не указан сертификат')
    if (!certificatePrice || certificatePrice <= 0) errors.push('Неверная цена сертификата')

    if (errors.length > 0) {
      return reply.status(400).send({ success: false, message: errors.join(', ') })
    }

    const order = await (app as any).prisma.certificateOrder.create({
      data: {
        certificate_name: certificateName,
        certificate_price: certificatePrice,
        full_name: fullName,
        phone,
        email,
        comment: comment || '',
      },
    })

    return { success: true, message: `Заказ успешно сохранен! ID: ${order.id}`, id: order.id }
  })
}
