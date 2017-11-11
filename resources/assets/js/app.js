
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../node_modules/vue-form-wizard/dist/vue-form-wizard.js');
require('../../../node_modules/vue-form-generator/dist/vfg.js');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueFormGenerator from 'vue-form-generator';
import VueFormWizard from 'vue-form-wizard';
import 'vue-form-wizard/dist/vue-form-wizard.min.css';
import 'vue-form-generator/dist/vfg.css'
Vue.use(VueFormGenerator);
Vue.use(VueFormWizard);
// Vue.use(VueFormGenerator)

Vue.component('application', require('./components/Application.vue'));
Vue.component('task', require('./components/Task.vue'));
Vue.component('step', require('./components/Step.vue'));

const app = new Vue({
    el: '#app'
});
