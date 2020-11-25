import Vue from 'vue'
import VueI18n from 'vue-i18n'
// import VueCookie from 'vue-cookie';
import viLocale from './vi/index.js'
import jaLocale from './ja/index.js'

Vue.use(VueI18n)

const messages = {
  vi: {
    ...viLocale
  },
  ja: {
    ...jaLocale
  }
}

// const getLanguage = () => {
//   const chooseLanguage = VueCookie.get('language');
//   if (chooseLanguage) return chooseLanguage;

//   const language = (
//     navigator.language || navigator.browserLanguage
//   ).toLowerCase();

//   const locales = Object.keys(messages);
//   for (const locale of locales) {
//     if (language.indexOf(locale) > -1) {
//       return locale;
//     }
//   }

//   return 'vi';
// };

const i18n = new VueI18n({
  locale: 'vi', // options: vi, ja
  messages
})

export default i18n
