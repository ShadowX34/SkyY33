import { FastifyInstance } from 'fastify'

export default async function newsRoutes(app: FastifyInstance) {
  // GET /api/news — все активные новости
  app.get('/news', async (request, reply) => {
    const news = await (app as any).prisma.news.findMany({
      where: { is_active: true },
      orderBy: { sort_order: 'asc' },
    })
    return { success: true, data: news }
  })
}
