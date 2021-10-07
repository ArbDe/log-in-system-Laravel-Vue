import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    userLoggedIn: false
  },
  mutations: {
    login (state) {
      state.userLoggedIn = true;
    },
    logout (state) {
      state.userLoggedIn = false;
    }
  }
})

export default store;