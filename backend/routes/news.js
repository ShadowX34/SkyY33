import { prisma } from '../server.js'

export default async function (fastify, opts) {
  // Получение новостей (с сортировкой)
  fastify.get('/news', async (request, reply) => {
    try {
      const news = await prisma.news.findMany({
        where: { is_active: true },
        orderBy: [
          { sort_order: 'asc' },
          { pub_date: 'desc' }
        ]
      })
      return news
    } catch (error) {
      fastify.log.error(error)
      reply.status(500).send({ error: 'Failed to fetch news' })
    }
  })
}
