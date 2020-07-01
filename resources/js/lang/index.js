import Vue from "vue";
import VueI18n from "vue-i18n";
import VueCookie from "vue-cookie";
import viLocale from "./vi/index.js";
import jaLocale from "./ja/index.js";

console.log(viLocale)

Vue.use(VueI18n);

const messages = {
  vi: {
    ...viLocale
  },
  ja: {
    ...jaLocale
  },
  en: {
    ...viLocale
  }
};

const getLanguage = () => {
  const chooseLanguage = VueCookie.get("language");
  console.log("chooseLanguage ", chooseLanguage);

  if (chooseLanguage) return chooseLanguage;

  const language = (
    navigator.language || navigator.browserLanguage
  ).toLowerCase();

  Object.keys(messages).forEach(locale => {
    if (language.indexOf(locale) > -1) {
      return locale;
    }
  });
  return "vi";
};

const i18n = new VueI18n({
  locale: getLanguage(), //options: vi, ja
  messages
});

export default i18n;
