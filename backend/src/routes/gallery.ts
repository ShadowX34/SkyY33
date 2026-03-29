import { FastifyInstance } from 'fastify'

export default async function galleryRoutes(app: FastifyInstance) {
  // GET /api/gallery — фото загруженные через админку
  app.get('/gallery', async (request, reply) => {
    const photos = await (app as any).prisma.galleryPhoto.findMany({
      orderBy: { uploaded_at: 'desc' },
    })
    return { success: true, data: photos }
  })
}
