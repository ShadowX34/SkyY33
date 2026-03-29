import { FastifyInstance } from 'fastify'
import * as path from 'path'
import * as fs from 'fs'
import * as dotenv from 'dotenv'
dotenv.config()

const UPLOAD_DIR = path.resolve(__dirname, '../../../..', process.env.UPLOAD_DIR || '../frontend/public/uploads')

export default async function adminReviewsRoutes(app: FastifyInstance) {
  const auth = { preHandler: [(app as any).authenticate] }
  const prisma = () => (app as any).prisma

  // GET /api/admin/reviews
  app.get('/reviews', auth, async () => {
    const reviews = await prisma().review.findMany({ orderBy: { sort_order: 'asc' } })
    return { success: true, data: reviews }
  })

  // POST /api/admin/reviews — создать отзыв (multipart)
  app.post('/reviews', auth, async (request: any, reply) => {
    const parts = request.parts()
    const fields: any = {}
    let imageFilename: string | null = null

    for await (const part of parts) {
      if (part.type === 'file' && part.fieldname === 'image') {
        const ext = path.extname(part.filename)
        imageFilename = `review_${Date.now()}${ext}`
        const reviewDir = path.join(UPLOAD_DIR, 'reviews')
        fs.mkdirSync(reviewDir, { recursive: true })
        const writeStream = fs.createWriteStream(path.join(reviewDir, imageFilename))
        await part.file.pipe(writeStream)
      } else if (part.type === 'field') {
        fields[part.fieldname] = part.value
      }
    }

    const review = await prisma().review.create({
      data: {
        type: fields.type || 'slider',
        image: imageFilename,
        review_text: fields.review_text || null,
        caption: fields.caption || null,
        sort_order: fields.sort_order ? parseInt(fields.sort_order) : 0,
        is_active: fields.is_active !== '0',
      },
    })
    return { success: true, data: review }
  })

  // PUT /api/admin/reviews/:id
  app.put('/reviews/:id', auth, async (request: any, reply) => {
    const id = parseInt((request.params as any).id)
    const parts = request.parts()
    const fields: any = {}
    let imageFilename: string | null = null

    for await (const part of parts) {
      if (part.type === 'file' && part.fieldname === 'image') {
        const ext = path.extname(part.filename)
        imageFilename = `review_${Date.now()}${ext}`
        const reviewDir = path.join(UPLOAD_DIR, 'reviews')
        fs.mkdirSync(reviewDir, { recursive: true })
        const writeStream = fs.createWriteStream(path.join(reviewDir, imageFilename))
        await part.file.pipe(writeStream)
      } else if (part.type === 'field') {
        fields[part.fieldname] = part.value
      }
    }

    const updateData: any = {
      type: fields.type || 'slider',
      review_text: fields.review_text || null,
      caption: fields.caption || null,
      sort_order: fields.sort_order ? parseInt(fields.sort_order) : 0,
      is_active: fields.is_active !== '0',
    }
    if (imageFilename) updateData.image = imageFilename

    const review = await prisma().review.update({ where: { id }, data: updateData })
    return { success: true, data: review }
  })

  // DELETE /api/admin/reviews/:id
  app.delete<{ Params: { id: string } }>('/reviews/:id', auth, async (request, reply) => {
    const id = parseInt(request.params.id)
    await prisma().review.delete({ where: { id } })
    return { success: true, message: 'Отзыв удалён' }
  })
}
