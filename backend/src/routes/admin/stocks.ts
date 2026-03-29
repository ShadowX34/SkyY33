import { FastifyInstance } from 'fastify'

export default async function adminStocksRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }
  const prisma = () => (app as any).prisma

  // GET /api/admin/stocks — все акции
  app.get('/stocks', auth, async () => {
    const stocks = await prisma().stock.findMany({ orderBy: { sort_order: 'asc' } })
    return { success: true, data: stocks }
  })

  // POST /api/admin/stocks — создать акцию
  app.post<{ Body: any }>('/stocks', auth, async (request, reply) => {
    const data = request.body
    const stock = await prisma().stock.create({
      data: {
        title: data.title,
        description: data.description || null,
        tag: data.tag || null,
        price_label: data.price_label || null,
        detail_text: data.detail_text || null,
        pub_date: data.pub_date ? new Date(data.pub_date) : null,
        is_active: data.is_active !== undefined ? Boolean(data.is_active) : true,
        sort_order: data.sort_order ? parseInt(data.sort_order) : 0,
      },
    })
    return { success: true, data: stock }
  })

  // PUT /api/admin/stocks/:id — обновить акцию
  app.put<{ Params: { id: string }; Body: any }>('/stocks/:id', auth, async (request, reply) => {
    const id = parseInt(request.params.id)
    const data = request.body
    const stock = await prisma().stock.update({
      where: { id },
      data: {
        title: data.title,
        description: data.description || null,
        tag: data.tag || null,
        price_label: data.price_label || null,
        detail_text: data.detail_text || null,
        pub_date: data.pub_date ? new Date(data.pub_date) : null,
        is_active: data.is_active !== undefined ? Boolean(data.is_active) : true,
        sort_order: data.sort_order ? parseInt(data.sort_order) : 0,
      },
    })
    return { success: true, data: stock }
  })

  // DELETE /api/admin/stocks/:id — удалить акцию
  app.delete<{ Params: { id: string } }>('/stocks/:id', auth, async (request, reply) => {
    const id = parseInt(request.params.id)
    await prisma().stock.delete({ where: { id } })
    return { success: true, message: 'Акция удалена' }
  })
}
