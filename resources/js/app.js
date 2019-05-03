require('./bootstrap')
require('./include/adminComponent')
import Vue from 'vue'
import VeeValidate from 'vee-validate';


Vue.use(VeeValidate);

const app = new Vue({
    el: '#app'
});
