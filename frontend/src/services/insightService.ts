import api from './api'

export async function reportCountByMonth() {
    return api.get("/api/insights/reportcountbymonth")
}