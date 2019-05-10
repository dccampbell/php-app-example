/** Lodash **/
window._ = require('lodash');

/** Axios **/
let Axios = require('axios');
window.axios = Axios.create({});

// Auto-register X-Requested-With Header
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Auto-register X-CSRF-TOKEN Header
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.log('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/** Vue **/
window.Vue = require('vue');
window.BootstrapVue = require('bootstrap-vue');
Vue.use(BootstrapVue);
