import axios from "axios";
import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);
const persistedData = new createPersistedState({
    key: "user",
    storage: localStorage,
    reducer: (state) => ({
        loggedInUser: state.loggedInUser,
    }),
});

export default new Vuex.Store({
    state: {
        loggedInUser: null,

        allBooks: [],
        allEvents: [],
        // allAccounts: [],
    },

    actions: {
        storeUser({ commit }, data) {
            commit("storeUser", data);
        },

        login(context) {
            let user_data = {
                id: 1,
                name: "dos",
            };

            axios.post("/api/getUser", user_data).then((response) => {
                context.commit("login", response.data);
            });
        },

        logout(context) {
            context.commit("logout");
        },

        getBooks(context) {
            axios({
                method: "post",
                url: "/api/books",
            }).then((res) => {
                context.commit("getBooks", res.data);
            });
        },

        getEvents(context) {
            axios({
                method: "post",
                url: "/api/events",
            }).then((res) => {
                context.commit("getEvents", res.data);
            });
        },

        // getAccounts(context) {
        //     axios({
        //         method: "post",
        //         url: "/api/getAccounts",
        //     }).then((res) => {
        //         context.commit("getAccounts", res.data);
        //     });
        // },
    },

    mutations: {
        storeUser: (state, data) => {
            state.loggedInUser = data;
        },

        login(state, data) {
            state.loggedInUser = data;
            state.isLoggedin = true;
        },

        logout(state) {
            state.loggedInUser = {};
            // state.isLoggedin = false;
        },

        getBooks(state, data) {
            state.allBooks = data;
        },

        getEvents(state, data) {
            state.allEvents = data;
        },

        // getAccounts(state, data) {
        //     state.allAccounts = data;
        // },
    },
    getters: {},
    plugins: [persistedData],
});
