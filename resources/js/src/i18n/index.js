import {createI18n} from "vue-i18n";

const messages = {
    en: {
        nav: {
            home: "Home"
        }
    },
    ru: {
        nav: {
            home: "Главная"
        }
    }
}

export default createI18n({
    locale: 'ru',
    fallbackLocale: 'ru',
    legacy: false,
    globalInjection: true,
    messages
})
