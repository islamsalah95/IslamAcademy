import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    // token:localStorage.getItem('token'),
    // userName:localStorage.getItem('userName'),
    // type:localStorage.getItem('type'),
    token: null,
    name: null,
    type: null,
  },
  getters: {
    token(state) {
      return state.token;
    },
    isAdmin(state) {
      // return state.type;
      return localStorage.getItem("type");
    },

    isAuth(state) {
      return localStorage.getItem("token");
      // return !!state.token;
    },userName(state) {
      return localStorage.getItem("name");
      // return !!state.token;
    },
  },
  mutations: {
    setUser(state, payload) {
      state.token = payload.token;
      state.name = payload.name;
      state.type = payload.type;
    },
  },
  actions: {
    async signUp(context, payload) {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios
        .post("http://127.0.0.1:8000/api/register", {
          name: payload.name,
          email: payload.email,
          password: payload.password,
          password_confirmation: payload.password_confirmation,
        })
        .then(function (responseData) {
          context.commit("setUser", {
            token: responseData.data.data.token,
            name: responseData.data.data.name,
          });
          console.log(responseData.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    async login(context, payload) {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios
        .post("http://127.0.0.1:8000/api/login", {
          email: payload.email,
          password: payload.password,
        })
        .then(function (responseData) {
          console.log(responseData);
          localStorage.setItem("token", responseData.data.data.user.token);
          localStorage.setItem("name", responseData.data.data.user.name);
          localStorage.setItem("type", responseData.data.data.user.type);
          context.commit("setUser", {
            token: responseData.data.data.token,
            name: responseData.data.data.name,
            type: responseData.data.data.type,
          });
        })
        .catch(function (error) {
          throw new Error(
            `Failed to authenticate. Check your login data.==>${error}`
          );});
    },
  },
  modules: {},
});
