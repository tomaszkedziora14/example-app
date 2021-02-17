

require('./bootstrap');

import Vue from 'vue'

// import  App from './componets/App'


Vue.config.productionTip = false
import List from '.js/components/list';

console.log(2344);

const app = new Vue({
    el: '#app',
    components: { App }
});
