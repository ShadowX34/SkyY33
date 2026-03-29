import { prisma } from '../server.js'

export default async function (fastify, opts) {
  // Получение акций
  fastify.get('/stocks', async (request, reply) => {
    try {
      const stocks = await prisma.stock.findMany({
        where: { is_active: true },
        orderBy: { sort_order: 'asc' }
      })
      return stocks
    } catch (error) {
      fastify.log.error(error)
      reply.status(500).send({ error: 'Failed to fetch stocks' })
    }
  })
}
