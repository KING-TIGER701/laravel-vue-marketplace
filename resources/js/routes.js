module.exports = [
    {
        path: '/login',
        name: 'auth.login',
        component: () => import('./components/Auth/Login.vue'),
        meta: { guest: true }
    },
    {
        path: '/register/',
        name: 'auth.register',
        component: () => import('./components/Auth/Register.vue'),
        meta: { guest: true }
    },

    {
        path: '/',
        name: 'adverts.index',
        component: () => import('./components/Adverts/Index.vue')
    },
    {
        path: '/adverts/:slug',
        name: 'adverts.show',
        component: () => import('./components/Adverts/Show.vue')
    },
    {
        path: '/adverts/create',
        name: 'adverts.create',
        component: () => import('./components/Adverts/Create.vue'),
        meta: { authOnly: true }
    },

];
