import { FastifyInstance } from 'fastify'

export default async function adminOrdersRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }
  const prisma = () => (app as any).prisma

  // GET /api/admin/orders
  app.get('/orders', auth, async (request: any, reply) => {
    const { status } = request.query as { status?: string }
    const where: any = {}
    if (status) where.status = status

    const orders = await prisma().certificateOrder.findMany({
      where,
      orderBy: { order_date: 'desc' },
    })
    return { success: true, data: orders }
  })

  // PATCH /api/admin/orders/:id — сменить статус
  app.patch<{ Params: { id: string }; Body: { status: string } }>(
    '/orders/:id',
    auth,
    async (request, reply) => {
      const id = parseInt(request.params.id)
      const { status } = request.body

      const validStatuses = ['pending', 'processed', 'completed', 'cancelled']
      if (!validStatuses.includes(status)) {
        return reply.status(400).send({ success: false, message: 'Неверный статус' })
      }

      const order = await prisma().certificateOrder.update({
        where: { id },
        data: { status },
      })
      return { success: true, data: order }
    }
  )
}
