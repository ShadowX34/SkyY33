import { prisma } from '../server.js'

export default async function (fastify, opts) {
  fastify.get('/gallery', async (request, reply) => {
    try {
      const photos = await prisma.galleryPhoto.findMany({
        orderBy: { uploaded_at: 'desc' }
      })
      return photos
    } catch (error) {
      fastify.log.error(error)
      reply.status(500).send({ error: 'Failed to fetch gallery' })
    }
  })
}
