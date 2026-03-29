import { FastifyInstance } from 'fastify'
import * as bcrypt from 'bcrypt'

export default async function adminAuthRoutes(app: FastifyInstance) {
  // POST /api/admin/login
  app.post<{ Body: { username: string; password: string } }>('/login', async (request, reply) => {
    const { username, password } = request.body

    if (!username || !password) {
      return reply.status(400).send({ success: false, message: 'Введите логин и пароль' })
    }

    const user = await (app as any).prisma.adminUser.findUnique({ where: { username } })
    if (!user) {
      return reply.status(401).send({ success: false, message: 'Неверный логин или пароль' })
    }

    const valid = await bcrypt.compare(password, user.password)
    if (!valid) {
      return reply.status(401).send({ success: false, message: 'Неверный логин или пароль' })
    }

    const token = app.jwt.sign({ id: user.id, username: user.username }, { expiresIn: '8h' })
    return { success: true, token }
  })

  // GET /api/admin/me — проверить токен
  app.get('/me', { preHandler: [(app as any).authenticate] }, async (request, reply) => {
    return { success: true, user: (request as any).user }
  })
}
