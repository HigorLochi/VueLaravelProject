import { createI18n } from 'vue-i18n'

import en from '@/i18n/locales/en.json'
import ptbr from '@/i18n/locales/ptbr.json'

const i18n = createI18n({
    legacy: false,
    locale: 'ptbr',
    fallbackLocale: 'en',
    messages: {
        en,
        ptbr
    }
})

export default i18n