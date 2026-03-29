import { FastifyInstance } from 'fastify'

export default async function stocksRoutes(app: FastifyInstance) {
  // GET /api/stocks — все активные акции
  app.get('/stocks', async (request, reply) => {
    const stocks = await (app as any).prisma.stock.findMany({
      where: { is_active: true },
      orderBy: { sort_order: 'asc' },
    })
    return { success: true, data: stocks }
  })
}
