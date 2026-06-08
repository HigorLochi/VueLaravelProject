import api from './api'

export async function login(email: string, password: string) {

    await api.get('/sanctum/csrf-cookie')

    return api.post('/login', {
        email,
        password
    })
}

export async function logout() {
    return api.post('/logout')
}

export async function getUser() {
    return api.get('/api/user')
}