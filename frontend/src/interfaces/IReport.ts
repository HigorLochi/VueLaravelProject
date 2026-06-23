import type { ObjectEmitsOptions } from "vue"

export interface Report {
    id: number
    user_id: Number
    user: any
    danger_level_id: Number
    danger_level: any
    city_id: Number
    city: any
    title: string
    description: string
    created_at: Date
    updated_at: Date
}