import { FastifyInstance } from 'fastify'
import * as path from 'path'
import * as fs from 'fs'
import * as dotenv from 'dotenv'
dotenv.config()

const UPLOAD_DIR = path.resolve(__dirname, '../../../..', process.env.UPLOAD_DIR || '../frontend/public/uploads')

export default async function adminGalleryRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }
  const prisma = () => (app as any).prisma

  // GET /api/admin/gallery
  app.get('/gallery', auth, async () => {
    const photos = await prisma().galleryPhoto.findMany({ orderBy: { uploaded_at: 'desc' } })
    return { success: true, data: photos }
  })

  // POST /api/admin/gallery — загрузить фото
  app.post('/gallery', auth, async (request: any, reply) => {
    const parts = request.parts()
    const uploaded = []

    for await (const part of parts) {
      if (part.type === 'file') {
        const ext = path.extname(part.filename)
        const filename = `gallery_${Date.now()}_${Math.random().toString(36).slice(2)}${ext}`
        const galleryDir = path.join(UPLOAD_DIR, 'gallery')
        fs.mkdirSync(galleryDir, { recursive: true })
        const writeStream = fs.createWriteStream(path.join(galleryDir, filename))
        await part.file.pipe(writeStream)

        const photo = await prisma().galleryPhoto.create({ data: { filename } })
        uploaded.push(photo)
      }
    }

    return { success: true, data: uploaded, message: `Загружено файлов: ${uploaded.length}` }
  })

  // DELETE /api/admin/gallery/:id
  app.delete<{ Params: { id: string } }>('/gallery/:id', auth, async (request, reply) => {
    const id = parseInt(request.params.id)
    const photo = await prisma().galleryPhoto.findUnique({ where: { id } })
    if (!photo) return reply.status(404).send({ success: false, message: 'Фото не найдено' })

    // Удалить файл с диска
    const filePath = path.join(UPLOAD_DIR, 'gallery', photo.filename)
    if (fs.existsSync(filePath)) fs.unlinkSync(filePath)

    await prisma().galleryPhoto.delete({ where: { id } })
    return { success: true, message: 'Фото удалено' }
  })
}
