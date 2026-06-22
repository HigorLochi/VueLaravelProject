import api from './api'

export async function search(where: Object, page: Number = 1, limitPerPage: any = null) {
    return api.post('/api/reports/search?page=' + page, {where : where, limitPerPage: limitPerPage})
}

export async function getById(id: Number) {
    return api.get(`/api/reports/${id}`)
}

export async function create(reports: Array<Object>) {
    return api.post('/api/reports', {reports: reports})
}

export async function update(report: any) {
    return api.put(`/api/reports/${report.id}`, report)
}

export async function destroy(id: Number) {
    return api.delete(`/api/reports/${id}`)
}