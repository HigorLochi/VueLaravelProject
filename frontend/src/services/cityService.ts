import api from './api'

export async function search(where: Object, page: Number, limitPerPage: any) {
    return api.post('/api/cities/search?page=' + page, {where : where, limitPerPage: limitPerPage})
}

export async function getById(id: Number) {
    return api.get(`/api/cities/${id}`)
}

export async function create(cities: Array<Object>) {
    return api.post('/api/cities', {cities: cities})
}

export async function update(city: any) {
    return api.put(`/api/cities/${city.id}`, city)
}

export async function destroy(id: Number) {
    return api.delete(`/api/cities/${id}`)
}