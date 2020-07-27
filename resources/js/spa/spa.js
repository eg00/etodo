window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

window.Vue = require('vue');
import Vue from 'vue';
import router from './router';
import store from './store';
Vue.component('app-layout', require('./views/Layout.vue').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
