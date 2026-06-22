import api from './api'

export async function search(where: Object, page: Number = 1, limitPerPage: any = null) {
    return api.post('/api/dangerlevels/search?page=' + page, {where : where, limitPerPage: limitPerPage})
}

export async function getById(id: Number) {
    return api.get(`/api/dangerlevels/${id}`)
}

export async function create(dangerlevels: Array<Object>) {
    return api.post('/api/dangerlevels', {dangerlevels: dangerlevels})
}

export async function update(dangerlevel: any) {
    return api.put(`/api/dangerlevels/${dangerlevel.id}`, dangerlevel)
}

export async function destroy(id: Number) {
    return api.delete(`/api/dangerlevels/${id}`)
}