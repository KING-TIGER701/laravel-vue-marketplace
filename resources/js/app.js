require('./bootstrap')

import Vue from "vue";

import Vuex from "vuex";
Vue.use(Vuex);

import VueRouter from "vue-router";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: require('./routes.js')
});

function isLoggedIn() {
    return localStorage.getItem('auth')
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authOnly)) {
        if (!isLoggedIn()) {
            next({
                path: '/login',
                query: {redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next()
    }
})


const store = new Vuex.Store({
    state: {
        adverts: [],
        categories: [],
    },
    mutations: {
        updateAdverts(state, adverts) {
            state.adverts = adverts;
        },
        updateCategories(state, categories) {
            state.categories = categories;
        },
    },
    actions: {
        getAdverts({ commit }) {
            axios.get('/api/adverts')
                .then((response) => {
                    commit('updateAdverts', response.data);
                })
                .catch((error) => console.error(error));
        },
        getCategories({ commit }) {
            axios.get('/api/categories')
                .then((response) => {
                    commit('updateCategories', response.data);
                })
                .catch((error) => console.error(error));
        }
    }
});

const app = new Vue({
    router,
    store,
    el: '#app',
    created() {
        store.dispatch('getAdverts')
            .then(() => {
                store.dispatch('getCategories')
                    .catch((error) => console.log(error))
            }).then(_ => {})
            .catch((error) => console.error(error));
    }
});
