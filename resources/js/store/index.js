import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

import users from "./users";
import auth from "./auth";
import departments from "./departments";
import projects from "./projects";
import tasks from "./tasks";
import reports from "./reports";
import roles from "./roles";


const store = new Vuex.Store({
  strict: process.env.NODE_ENV !== "production",
  state: {
    isLoading: false,
    isUpdating: false,
    isSubmitting: false
  },
  actions: {
    setLoading({ commit }, loading = false) {
      commit("SET_LOADING", loading);
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
    }
  },
  modules: {
    auth,
    users,
    departments,
    projects,
    tasks,
    reports,
    roles
  }
});

export default store;
