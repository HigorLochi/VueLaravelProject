import api from './api'

export async function get() {
    return api.get('/api/reports')
}

export async function create(report: object) {
    return api.post('/api/reports', report)
}

export async function update(report: object) {
    return api.put('/api/reports', report)
}

export async function destroy(id: Number) {
    return api.delete('/api/reports', {
        params: {
            id: id
        }
    })
}