import { FastifyInstance } from 'fastify'

export default async function reviewsRoutes(app: FastifyInstance) {
  // GET /api/reviews — все активные отзывы (slider + gratitude)
  app.get('/reviews', async (request: any, reply) => {
    const { type } = request.query as { type?: string }

    const where: any = { is_active: true }
    if (type === 'slider' || type === 'gratitude') {
      where.type = type
    }

    const reviews = await (app as any).prisma.review.findMany({
      where,
      orderBy: { sort_order: 'asc' },
    })
    return { success: true, data: reviews }
  })
}
