


import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Pages/Home.vue';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: "/products", component: Home },
    ]
});

export default router;


