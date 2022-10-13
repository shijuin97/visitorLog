import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);
import VueSession from 'vue-session';
var options = {
    persist: true
};
Vue.use(VueSession, options);

import devUtilities from "../js/services/devUtilities"
Vue.prototype.$devUtilities = devUtilities;

import store from "./store";
import routes from './router'

import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);

const app = new Vue({
    el: '#app',
    store,
    router: new VueRouter(routes),
});

require('./bootstrap');
