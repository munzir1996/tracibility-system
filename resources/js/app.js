/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('users-create', require('./components/users/CreateComponent.vue').default);
Vue.component('users-edit', require('./components/users/EditComponent.vue').default);
Vue.component('transports-create', require('./components/transports/CreateComponent.vue').default);
Vue.component('transports-edit', require('./components/transports/EditComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        sidebarOpen: false,
        notificationOpen: false,
        dropdownOpen: false,
        agentIsOpen: false,
    },

    beforeCreate(){
        this.sidebarOpen = false;
        this.notificationOpen = false;
        this.dropdownOpen = false;
    },

    methods: {

        sidebarOpenMethod(){
            this.sidebarOpen = !this.sidebarOpen;
        },

        notificationOpenMethod(){
            this.notificationOpen = !this.notificationOpen;
        },

        dropdownOpenMethod(){
            this.dropdownOpen = !this.dropdownOpen;
        },

        agentToggle(){
            this.agentIsOpen = !this.agentIsOpen
        },

    },

});
