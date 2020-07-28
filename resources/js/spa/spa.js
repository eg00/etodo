window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

window.Vue = require('vue');
import Vue from 'vue';
import store from './store';
import { BootstrapVue } from 'bootstrap-vue'
Vue.component('app-layout', require('./views/Layout.vue').default);
Vue.use(BootstrapVue)
const app = new Vue({
    el: '#app',
    store
});
