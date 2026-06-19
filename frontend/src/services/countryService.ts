import api from './api'

export async function get(where: Object) {
    return api.post('/api/countries/search', {where : where})
}

export async function getById(id: Number) {
    return api.get(`/api/countries/${id}`)
}

export async function create(country: object) {
    return api.post('/api/countries', country)
}

export async function update(country: object) {
    return api.put('/api/countries', country)
}

export async function destroy(id: Number) {
    return api.delete('/api/countries', {
        params: {
            id: id
        }
    })
}