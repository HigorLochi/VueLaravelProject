import api from './api'

export async function get() {
    return api.get('/api/users')
}

export async function create(service: object) {
    return api.post('/api/users', service)
}

export async function update(service: object) {
    return api.put('/api/users', service)
}

export async function destroy(id: Number) {
    return api.delete('/api/users', {
        params: {
            id: id
        }
    })
}