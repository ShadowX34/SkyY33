import { FastifyInstance } from 'fastify'

export default async function adminDashboardRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }

  // GET /api/admin/dashboard — статистика
  app.get('/dashboard', auth, async (request, reply) => {
    const prisma = (app as any).prisma

    const [ordersTotal, ordersNew, stocksCount, newsCount, reviewsCount, photosCount, latestOrders] =
      await Promise.all([
        prisma.certificateOrder.count(),
        prisma.certificateOrder.count({ where: { status: 'pending' } }),
        prisma.stock.count({ where: { is_active: true } }),
        prisma.news.count({ where: { is_active: true } }),
        prisma.review.count({ where: { is_active: true } }),
        prisma.galleryPhoto.count(),
        prisma.certificateOrder.findMany({
          orderBy: { order_date: 'desc' },
          take: 5,
        }),
      ])

    return {
      success: true,
      data: {
        stats: { ordersTotal, ordersNew, stocksCount, newsCount, reviewsCount, photosCount },
        latestOrders,
      },
    }
  })
}
