import Vue from "vue";
import Vuex from "vuex";

import users from "./users";
import auth from "./auth";
import departments from "./departments";
import projects from "./projects";
import tasks from './tasks'
import reports from './reports'

Vue.use(Vuex);

const store = new Vuex.Store({
  strict: process.env.NODE_ENV !== "production",
  state: {
    isLoading: false
  },
  actions: {
    setLoading({ commit }, loading = false) {
      commit("SET_LOADING", loading);
    }
  },
  mutations: {
    SET_LOADING: (state, loading = false) => {
      state.isLoading = loading;
    }
  },
  modules: {
    auth,
    users,
    departments,
    projects,
    tasks,
    reports
  }
});

export default store;
