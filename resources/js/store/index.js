import Vue from "vue";
import Vuex from "vuex";
import VueCookies from "vue-cookie";
Vue.use(Vuex);

import users from "./users";
import auth from "./auth";
import departments from "./departments";
import projects from "./projects";
import tasks from "./tasks";
import reports from "./reports";
import roles from "./roles";
import notifications from "./notifications";
import account from "./account";

const store = new Vuex.Store({
  strict: process.env.NODE_ENV !== "production",
  state: {
    isLoading: false,
    isUpdating: false,
    isSubmitting: false,
    showSelectLanguage: false,
    language: "vi",
    componentKey: 0
  },
  actions: {
    setLoading({ commit }, loading = false) {
      commit("SET_LOADING", loading);
    },
    setLanguage({ commit }, language) {
      commit("SET_LANGUAGE", language);
      VueCookies.set("language", language);
    }
  },
  mutations: {
    SET_LOADING: (state, loading = false) => {
      state.isLoading = loading;
    },
    SET_UPDATING: (state, updating = false) => {
      state.isUpdating = updating;
    },
    SET_SUBMITTING: (state, submitting = false) => {
      state.isSubmitting = submitting;
    },
    TOGGLE_SELECT_LANGUAGE: state => {
      state.showSelectLanguage = !state.showSelectLanguage;
    },
    SET_LANGUAGE: (state, language) => {
      state.language = language;
    },
    SET_COMPONENT_KEY: state => {
      state.componentKey += 1;
    }
  },
  modules: {
    auth,
    users,
    departments,
    projects,
    tasks,
    reports,
    roles,
    notifications,
    account
  }
});

export default store;
