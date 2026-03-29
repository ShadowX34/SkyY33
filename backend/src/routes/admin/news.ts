import { FastifyInstance } from 'fastify'
import * as path from 'path'
import * as fs from 'fs'
import * as dotenv from 'dotenv'
dotenv.config()

const UPLOAD_DIR = path.resolve(__dirname, '../../../..', process.env.UPLOAD_DIR || '../frontend/public/uploads/news')

export default async function adminNewsRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }
  const prisma = () => (app as any).prisma

  // GET /api/admin/news
  app.get('/news', auth, async () => {
    const news = await prisma().news.findMany({ orderBy: { sort_order: 'asc' } })
    return { success: true, data: news }
  })

  // POST /api/admin/news — создать новость (multipart с фото)
  app.post('/news', auth, async (request: any, reply) => {
    const parts = request.parts()
    const fields: any = {}
    let imageFilename: string | null = null

    for await (const part of parts) {
      if (part.type === 'file' && part.fieldname === 'image') {
        const ext = path.extname(part.filename)
        imageFilename = `news_${Date.now()}${ext}`
        const uploadPath = path.join(UPLOAD_DIR, 'news')
        fs.mkdirSync(uploadPath, { recursive: true })
        const writeStream = fs.createWriteStream(path.join(uploadPath, imageFilename))
        await part.file.pipe(writeStream)
      } else if (part.type === 'field') {
        fields[part.fieldname] = part.value
      }
    }

    const news = await prisma().news.create({
      data: {
        title: fields.title,
        excerpt: fields.excerpt || null,
        tag: fields.tag || null,
        image: imageFilename,
        pub_date: new Date(fields.pub_date),
        is_active: fields.is_active !== '0',
        sort_order: fields.sort_order ? parseInt(fields.sort_order) : 0,
      },
    })
    return { success: true, data: news }
  })

  // PUT /api/admin/news/:id
  app.put('/news/:id', auth, async (request: any, reply) => {
    const id = parseInt((request.params as any).id)
    const parts = request.parts()
    const fields: any = {}
    let imageFilename: string | null = null

    for await (const part of parts) {
      if (part.type === 'file' && part.fieldname === 'image') {
        const ext = path.extname(part.filename)
        imageFilename = `news_${Date.now()}${ext}`
        const uploadPath = path.join(UPLOAD_DIR, 'news')
        fs.mkdirSync(uploadPath, { recursive: true })
        const writeStream = fs.createWriteStream(path.join(uploadPath, imageFilename))
        await part.file.pipe(writeStream)
      } else if (part.type === 'field') {
        fields[part.fieldname] = part.value
      }
    }

    const updateData: any = {
      title: fields.title,
      excerpt: fields.excerpt || null,
      tag: fields.tag || null,
      pub_date: new Date(fields.pub_date),
      is_active: fields.is_active !== '0',
      sort_order: fields.sort_order ? parseInt(fields.sort_order) : 0,
    }
    if (imageFilename) updateData.image = imageFilename

    const news = await prisma().news.update({ where: { id }, data: updateData })
    return { success: true, data: news }
  })

  // DELETE /api/admin/news/:id
  app.delete<{ Params: { id: string } }>('/news/:id', auth, async (request, reply) => {
    const id = parseInt(request.params.id)
    await prisma().news.delete({ where: { id } })
    return { success: true, message: 'Новость удалена' }
  })
}
