import Fastify from 'fastify'
import cors from '@fastify/cors'
import multipart from '@fastify/multipart'
import fastifyStatic from '@fastify/static'
import path from 'path'
import { fileURLToPath } from 'url'
import { PrismaClient } from '@prisma/client'
import dotenv from 'dotenv'

// Загружаем переменные окружения
dotenv.config()

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)

const fastify = Fastify({ logger: true })
export const prisma = new PrismaClient()

// Настройка CORS
fastify.register(cors, {
  origin: process.env.FRONTEND_URL || 'http://localhost:5173',
  credentials: true
})

// Настройка Multipart для загрузки файлов (если понадобится в будущем)
fastify.register(multipart)

// Раздача статики (папка images из корня старого проекта, если нужно)
// Пока предполагаем, что Vue будет забирать картинки из своего public, 
// но если часть грузится бэкендом (например фото галереи) - настраиваем здесь.
fastify.register(fastifyStatic, {
  root: path.join(__dirname, '../images'),
  prefix: '/images/', // например http://localhost:3001/images/...
})

// Регистрируем роуты
fastify.register(import('./routes/reviews.js'), { prefix: '/api' })
fastify.register(import('./routes/news.js'), { prefix: '/api' })
fastify.register(import('./routes/stocks.js'), { prefix: '/api' })
fastify.register(import('./routes/gallery.js'), { prefix: '/api' })
fastify.register(import('./routes/orders.js'), { prefix: '/api' })

// Проверка работы сервера
fastify.get('/', async (request, reply) => {
  return { hello: 'world', project: 'Sky API' }
})

const start = async () => {
  try {
    const port = process.env.PORT || 3001
    await fastify.listen({ port: port, host: '0.0.0.0' })
    console.log(`Server listening on port ${port}`)
  } catch (err) {
    fastify.log.error(err)
    process.exit(1)
  }
}

start()
