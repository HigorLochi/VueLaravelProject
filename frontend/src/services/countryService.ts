import api from './api'

export async function search(where: Object, page: Number = 1, limitPerPage: any = null) {
    return api.post('/api/countries/search?page=' + page, {where : where, limitPerPage: limitPerPage})
}

export async function getById(id: Number) {
    return api.get(`/api/countries/${id}`)
}

export async function create(countries: Array<Object>) {
    return api.post('/api/countries', {countries: countries})
}

export async function update(country: any) {
    return api.put(`/api/countries/${country.id}`, country)
}

export async function destroy(id: Number) {
    return api.delete(`/api/countries/${id}`)
}