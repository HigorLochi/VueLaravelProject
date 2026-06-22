import api from './api'

export async function search(where: Object, page: Number = 1, limitPerPage: any = null) {
    return api.post('/api/users/search?page=' + page, {where : where, limitPerPage: limitPerPage})
}

export async function getById(id: Number) {
    return api.get(`/api/users/${id}`)
}

export async function create(users: Array<Object>) {
    return api.post('/api/users', {users: users})
}

export async function update(user: any) {
    return api.put(`/api/users/${user.id}`, user)
}

export async function destroy(id: Number) {
    return api.delete(`/api/users/${id}`)
}