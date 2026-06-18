import api from './api'

export async function get(where: Object) {
    return api.post('/api/cities/search', {where : where})
}

export async function getById(id: Number) {
    return api.get(`/api/cities/${id}`)
}

export async function create(report: object) {
    return api.post('/api/cities', report)
}

export async function update(report: object) {
    return api.put('/api/cities', report)
}

export async function destroy(id: Number) {
    return api.delete('/api/cities', {
        params: {
            id: id
        }
    })
}