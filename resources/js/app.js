
require('./bootstrap');

import Vue from 'vue'
import App from './components/Doc.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);



Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    components: { App }
});
