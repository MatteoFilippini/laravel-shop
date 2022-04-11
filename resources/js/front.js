require('./bootstrap');

window.Vue = require('vue');
import router from './routes.js';

import App from './components/App.vue';

const root = new Vue({
    el: "#root",
    router: router,
    render: h => h(App),
});

