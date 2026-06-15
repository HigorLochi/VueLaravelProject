import api from './api'

export async function get(where: Object) {
    return api.post('/api/users/search', {where : where})
}

export async function getById(id: Number) {
    return api.get(`/api/users/${id}`)
}

export async function create(users: Array<Object>) {
    return api.post('/api/users', {users: users})
}

export async function update(user: object) {
    return api.put('/api/users', user)
}

export async function destroy(id: Number) {
    return api.delete('/api/users', {
        params: {
            id: id
        }
    })
}