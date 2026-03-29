import Fastify from 'fastify'
import cors from '@fastify/cors'
import jwt from '@fastify/jwt'
import multipart from '@fastify/multipart'
import { PrismaClient } from '@prisma/client'
import * as bcrypt from 'bcrypt'
import * as dotenv from 'dotenv'

// Routes
import stocksRoutes from './routes/stocks'
import newsRoutes from './routes/news'
import reviewsRoutes from './routes/reviews'
import galleryRoutes from './routes/gallery'
import ordersRoutes from './routes/orders'
import adminAuthRoutes from './routes/admin/auth'
import adminStocksRoutes from './routes/admin/stocks'
import adminNewsRoutes from './routes/admin/news'
import adminGalleryRoutes from './routes/admin/gallery'
import adminOrdersRoutes from './routes/admin/orders'
import adminReviewsRoutes from './routes/admin/reviews'
import adminDashboardRoutes from './routes/admin/dashboard'

dotenv.config()

const prisma = new PrismaClient()
const PORT = parseInt(process.env.PORT || '3000')

async function bootstrap() {
  const app = Fastify({ logger: true })

  // Plugins
  await app.register(cors, {
    origin: ['http://localhost:5173', 'http://127.0.0.1:5173'],
    credentials: true,
  })

  await app.register(jwt, {
    secret: process.env.JWT_SECRET || 'sky_jwt_secret_2024_secure',
  })

  await app.register(multipart, {
    limits: { fileSize: 10 * 1024 * 1024 }, // 10MB
  })

  // Expose prisma on app instance
  app.decorate('prisma', prisma)

  // Auth decorator
  app.decorate('authenticate', async function (request: any, reply: any) {
    try {
      await request.jwtVerify()
    } catch (err) {
      reply.status(401).send({ success: false, message: 'Unauthorized' })
    }
  })

  // Public routes
  await app.register(stocksRoutes, { prefix: '/api' })
  await app.register(newsRoutes, { prefix: '/api' })
  await app.register(reviewsRoutes, { prefix: '/api' })
  await app.register(galleryRoutes, { prefix: '/api' })
  await app.register(ordersRoutes, { prefix: '/api' })

  // Admin routes
  await app.register(adminAuthRoutes, { prefix: '/api/admin' })
  await app.register(adminStocksRoutes, { prefix: '/api/admin' })
  await app.register(adminNewsRoutes, { prefix: '/api/admin' })
  await app.register(adminGalleryRoutes, { prefix: '/api/admin' })
  await app.register(adminOrdersRoutes, { prefix: '/api/admin' })
  await app.register(adminReviewsRoutes, { prefix: '/api/admin' })
  await app.register(adminDashboardRoutes, { prefix: '/api/admin' })

  // Ensure admin user exists
  await ensureAdminUser()

  // Start server
  try {
    await app.listen({ port: PORT, host: '0.0.0.0' })
    console.log(`🚀 Fastify server running at http://localhost:${PORT}`)
  } catch (err) {
    app.log.error(err)
    process.exit(1)
  }
}

async function ensureAdminUser() {
  const existing = await prisma.adminUser.findUnique({ where: { username: 'admin' } })
  if (!existing) {
    const hash = await bcrypt.hash('sky2024', 10)
    await prisma.adminUser.create({ data: { username: 'admin', password: hash } })
    console.log('✅ Admin user created: admin / sky2024')
  }
}

bootstrap()
