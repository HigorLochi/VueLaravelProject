import api from './api'

export async function get() {
    return api.get('/api/cities')
}

export async function create(city: object) {
    return api.post('/api/cities', city)
}

export async function update(city: object) {
    return api.put('/api/cities', city)
}

export async function destroy(id: Number) {
    return api.delete('/api/cities', {
        params: {
            id: id
        }
    })
}